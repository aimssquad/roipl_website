<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisionnaireDetail;

class VisionnaireDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     protected $prefix;
     public function __construct(){
         $this->prefix = 'admin.visionnairedetails.';
         // parent::__construct('Role');
     }
    public function index()
    {
        $datas = VisionnaireDetail::all();
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
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Single image
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Multiple images
        ]);

        // Create the VisionnaireDetail record
        $vision = VisionnaireDetail::create([
            'title' => $validated['title'], // Assign validated fields manually
        ]);

        // Handle single image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('visionnairedetails', 'public');
            $vision->update(['image' => $imagePath]); // Save the single image path
        }

        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $multipleImagePath = $image->store('visionnairedetails_images', 'public');
                // Assuming you have a relationship like `images` in VisionnaireDetail
                $vision->images()->create(['images' => $multipleImagePath]);
            }
        }

        return redirect()->route($this->prefix . 'index')->with('success', 'Created successfully.');
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
        $data = VisionnaireDetail::with('images')->findOrFail($id);
        return view($this->prefix . 'edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = VisionnaireDetail::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            // 'description' => 'required',
            // 'event_date' => 'required|date',
            // 'event_time' => 'required',
            // 'place' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Single image
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Multiple images
        ]);

        // Update the event
        $event->update($validated);

        // Handle single image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('visionnairedetails', 'public');
            $event->update(['image' => $imagePath]);
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('visionnairedetails_images', 'public');
                $event->images()->create(['images' => $imagePath]);
            }
        }

        return redirect()->route($this->prefix.'index')->with('success', ' updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = VisionnaireDetail::find($id);
        $event->delete();
        return redirect()->route($this->prefix.'index')->with('success', 'Data deleted successfully.');
    }
}
