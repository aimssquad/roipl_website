<?php

namespace App\Http\Controllers;

use App\Mail\CareerSubmittedToHR;
use App\Mail\CareerThankYouMail;
use App\Models\Department;
use App\Models\JobPost;
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
    public function index() {
        $states = State::all();
        $departments = Department::all();
        $datas = JobPost::where('is_active', 1)->get();
        // dd($datas);
        return view($this->prefix . 'careers', compact('states', 'departments', 'datas'));
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

    public function applyForm($encodedId)
    {
        $id = base64_decode($encodedId);
        $job = JobPost::findOrFail($id);
        $states = State::all();

        return view($this->prefix .'apply-form', compact('job','states'));
    }



    public function submitApplication(StoreCareerRequest $request)
    {
        try {
            // Initialize CV path
            $cvPath = null;

            // Handle CV file upload
            if ($request->hasFile('cv')) {
                $cvPath = $request->file('cv')->store('cvs', 'public');
            }

            // Create the career entry with job_id instead of department_id
            $career = Career::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'city_id' => $request->input('city'),
                'state_id' => $request->input('state'),
                'job_id' => $request->input('job_id'),  // Updated here
                'phone_number' => $request->input('phone_number'),
                'cv' => $cvPath
            ]);

            // Retrieve job based on the stored job ID
            $job = JobPost::find($career->job_id);
            $jobTitle = $job ? $job->title : 'Unknown Job';

            // Prepare email data for HR
            $hrEmailData = [
                'name' => $career->name,
                'email' => $career->email,
                'phone_number' => $career->phone_number,
                'job' => $jobTitle, // Replaces department
                'cv_link' => asset('storage/' . $career->cv),
            ];

            // Acknowledgment email to user
            $userEmailData = [
                'name' => $career->name,
            ];

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
