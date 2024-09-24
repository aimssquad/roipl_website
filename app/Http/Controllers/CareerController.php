<?php

namespace App\Http\Controllers;

use App\Mail\CareerSubmittedToHR;
use App\Mail\CareerThankYouMail;
use App\Models\Department;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCareerRequest;
use App\Models\Career;
use Illuminate\Support\Facades\Storage;
use Mail;



class CareerController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'front.';
    }
    public function index(){

        $states = State::all();
        $departments = Department::all();
        return view($this->prefix.'careers', compact('states','departments'));
    }
    public function store(StoreCareerRequest $request)
    {
        try {
            // Handle CV file upload
            if ($request->hasFile('cv')) {
                $cvPath = $request->file('cv')->store('cvs', 'public'); // Store the file in the 'cvs' directory
            }

            // Create the career entry
            $career = Career::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'city_id' => $request->input('city'),
                'state_id' => $request->input('state'),
                'department' => $request->input('department'),
                'phone_number' => $request->input('phone_number'),
                'cv' => $cvPath // Save the CV file path
            ]);

            $department = Department::find($career->department); // Retrieve department based on the stored department ID
            $departmentName = $department ? $department->department_name : 'Unknown Department';



            // Send email to HR
            $hrEmailData = [
                'name' => $career->name,
                'email' => $career->email,
                'phone_number' => $career->phone_number,
                'department' => $departmentName,
                'cv_link' => asset('storage/' . $career->cv),
                // Add any other details you want to include
            ];
            // dd($hrEmailData);

            Mail::send('emails.career_submitted_to_hr', $hrEmailData, function($message) {
                $message->to('abbas.uddin@ronakoptik.com') // Admin email
                        ->subject('New Career Submission');
            });

            // Send acknowledgment email to the user
            $userEmailData = [
                'name' => $career->name,
            ];

            Mail::send('emails.career_thank_you', $userEmailData, function($message) use ($career) {
                $message->to($career->email) // User's email
                        ->subject('Thank you for your career submission!');
            });

            return redirect()->back()->with('success', 'Career details submitted successfully!');

        } catch (\Exception $e) {
            \Log::error('Career submission error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Something went wrong, please try again.']);
        }
    }

}
