<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.abouts.';
        // parent::__construct('Role');
    }
    public function index()
    {
        $datas = About::all();
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
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Single image
        ]);

        // Create the event
        $event = About::create($validated);

        // Handle single image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about', 'public');
            $event->update(['image' => $imagePath]);
        }

        return redirect()->route($this->prefix.'index')->with('success', 'created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = About::find($id);
        return view($this->prefix.'edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = About::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4048', // Single image
        ]);

        // Update the event
        $data->update($validated);

        // Handle single image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about', 'public');
            $data->update(['image' => $imagePath]);
        }


        return redirect()->route($this->prefix.'index')->with('success', 'updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = About::find($id);
        $about->delete();

        return redirect()->route($this->prefix.'index')->with('success', 'Deleted successfully.');
    }
}
