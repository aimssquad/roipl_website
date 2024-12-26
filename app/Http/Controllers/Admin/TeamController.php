<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Storage;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.teams.';
    }
    public function index()
    {
        $datas = Team::all();
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
        $request->validate([
            'title' => 'required|string|max:255|unique:brand_logos,title',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:22048', // Max file size 2MB
        ]);

        // Store the images if they exist
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('teams', 'public');
        }


        // Create the brand record in the database
        Team::create([
            'title' => $request->input('title'),
            'order_by' => $request->input('order_by'),
            'image' => $imagePath,
        ]);

        // Redirect back with success message
        return redirect()->route($this->prefix.'index')->with('success', 'Team created successfully.');
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
        $data = Team::find($id);
        return view($this->prefix.'edit', compact('data'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255|unique:brand_logos,title,' . $team->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:22048',
        ]);

        // Find the brand by ID
        $team = Team::findOrFail($id);

        // Handle Image 1 upload (only if a new image is uploaded)
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($team->image && Storage::exists('public/' . $team->image)) {
                Storage::delete('public/' . $team->image);
            }
            // Store the new image
            $imagePath = $request->file('image')->store('teams', 'public');
            $team->image = $imagePath;
        }


        // Update the brand data
        $team->update([
            'title' => $request->input('title'),
            'order_by' => $request->input('order_by'),
        ]);

        // Redirect back with success message
        return redirect()->route($this->prefix.'index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);

        // Check if Image 1 exists and delete it from storage
        if ($team->image && Storage::exists('public/' . $team->image)) {
            Storage::delete('public/' . $team->image);
        }
        // Delete the brand record from the database
        $team->delete();

        // Redirect back with a success message
        return redirect()->route($this->prefix.'index')->with('success', 'Data deleted successfully.');
    }
}
