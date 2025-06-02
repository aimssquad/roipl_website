<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
    */protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.jobs.';
    }
    public function index()
    {
        $datas = JobPost::withCount('applications')->get();
        return view($this->prefix.'index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->prefix.'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'job_type' => 'required|string|in:Full-time,Part-time,Internship,Contract',
            'last_date_to_apply' => 'nullable|date',
            'is_active' => 'required|boolean',
        ]);

        JobPost::create($validated);
         return redirect()->route($this->prefix.'index')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = JobPost::findOrFail($id);
        return view($this->prefix.'show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = JobPost::find($id);
        return view($this->prefix.'edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'job_type' => 'required|string',
            'last_date_to_apply' => 'nullable|date',
        ]);

        // Default value for checkbox (if unchecked)
        $validated['is_active'] = $request->input('is_active', 0);

        $job = JobPost::findOrFail($id);
        $job->update($validated);

        return redirect()->route($this->prefix.'index')->with('success', 'Job updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
