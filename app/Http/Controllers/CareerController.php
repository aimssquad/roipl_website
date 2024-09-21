<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCareerRequest;
use App\Models\Career;
use Illuminate\Support\Facades\Storage;

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
            // dd($request->all());
            // Handle CV file upload
            if ($request->hasFile('cv')) {
                $cvPath = $request->file('cv')->store('cvs', 'public'); // Store the file in the 'cvs' directory
            }

            // Create the career entry
            Career::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'city_id' => $request->input('city'),
                'state_id' => $request->input('state'),
                'department' => $request->input('department'),
                'phone_number' => $request->input('phone_number'),
                'cv' => $cvPath // Save the CV file path
            ]);

            return redirect()->back()->with('success', 'Career details submitted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong, please try again.']);
        }
    }

}
