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
            // Initialize CV path
            $cvPath = null;

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
                'department_id' => $request->input('department'),
                'phone_number' => $request->input('phone_number'),
                'cv' => $cvPath // Save the CV file path
            ]);

            // Retrieve department based on the stored department ID
            $department = Department::find($career->department_id);
            $departmentName = $department ? $department->department_name : 'Unknown Department';

            // Prepare email data for HR
            $hrEmailData = [
                'name' => $career->name,
                'email' => $career->email,
                'phone_number' => $career->phone_number,
                'department' => $departmentName,
                'cv_link' => asset('storage/' . $career->cv),
            ];

            // Prepare acknowledgment email data for the user
            $userEmailData = [
                'name' => $career->name,
            ];

            // Try sending emails
            try {
                Mail::send('emails.career_submitted_to_hr', $hrEmailData, function ($message) {
                    $message->to('hr@ronakoptik.com')->subject('New Career Submission');
                });

                Mail::send('emails.career_thank_you', $userEmailData, function ($message) use ($career) {
                    $message->to($career->email)->subject('Thank you for your career submission!');
                });

            } catch (\Exception $mailException) {
                \Log::error('Mail sending failed: ' . $mailException->getMessage());
            }

            return redirect()->back()->with('success', 'Your details submitted successfully. Your personal information is secure and confidential.');

        } catch (\Exception $e) {
            \Log::error('Career submission error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Something went wrong, please try again.']);
        }
    }


}
