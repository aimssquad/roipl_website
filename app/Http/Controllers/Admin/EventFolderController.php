<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventImage;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventFolder;

class EventFolderController extends Controller
{
    public function index(Event $event)
    {
        $folders = $event->folders;
        return view('admin.event-folders.index', compact('event', 'folders'));
    }
    public function create(Event $event)
    {
        return view('admin.event-folders.create', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Single image
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Multiple images
            'description' => 'required|string',
        ]);

        // Store the single image, if provided
        $imagePath = $request->file('image') ? $request->file('image')->store('event_images', 'public') : null;

        // Create a new EventFolder with the description and single image
        $folder = EventFolder::create([
            'event_id' => $event->id,
            'image_path' => $imagePath,
            'description' => $request->description,
        ]);

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $multipleImagePath = $image->store('event_images_folder', 'public');
                $folder->images()->create(['image_path' => $multipleImagePath]);
            }
        }

        return redirect()->route('admin.event-folders.index', $event->id)
                        ->with('success', 'Event Folder created successfully with multiple images!');
    }

    public function edit(Event $event, EventFolder $folder)
    {
        // Load all associated images for the folder
        $images = $folder->images;

        // Pass images to the view along with event and folder
        return view('admin.event-folders.edit', compact('event', 'folder', 'images'));
    }

    public function update(Request $request, Event $event, EventFolder $folder)
    {
        // Validate the inputs
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Single image
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Multiple images
            'description' => 'required|string',
        ]);

        // Update the main image if a new one is uploaded
        if ($request->hasFile('image')) {
            // Delete the old main image if it exists
            if ($folder->image_path && \Storage::disk('public')->exists($folder->image_path)) {
                \Storage::disk('public')->delete($folder->image_path);
            }

            // Store the new main image
            $folder->image_path = $request->file('image')->store('event_images', 'public');
        }

        // Update the description
        $folder->description = $request->description;
        $folder->save();

        // Handle new additional images if uploaded
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store each image and save the path in the event_folder_images table
                $imagePath = $image->store('event_images_folder', 'public');
                $folder->images()->create(['image_path' => $imagePath]);
            }
        }

        // Redirect back with a success message
        return redirect()->route('admin.event-folders.index', $event->id)
                         ->with('success', 'Event Folder updated successfully with additional images!');
    }

    public function destroy(Event $event, EventFolder $folder)
    {
        // Delete the main folder image if it exists
        if ($folder->image_path && \Storage::disk('public')->exists($folder->image_path)) {
            \Storage::disk('public')->delete($folder->image_path);
        }

        // Delete additional images related to this folder
        foreach ($folder->images as $image) {
            if (\Storage::disk('public')->exists($image->image_path)) {
                \Storage::disk('public')->delete($image->image_path);
            }
            $image->delete(); // Delete image record from the database
        }

        // Delete the folder itself
        $folder->delete();

        return redirect()->route('admin.event-folders.index', $event->id)
                        ->with('success', 'Event Folder and all associated images deleted successfully!');
    }



}
