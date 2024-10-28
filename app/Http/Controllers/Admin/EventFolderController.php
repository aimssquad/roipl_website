<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $request->validate([
            'image' => 'required|image',
            'description' => 'required|string',
        ]);

        // Store the uploaded image
        $imagePath = $request->file('image')->store('event_images', 'public');

        // Create a new EventFolder
        EventFolder::create([
            'event_id' => $event->id,
            'image_path' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.event-folders.index', $event->id)
                        ->with('success', 'Event Folder created successfully!');
    }
    public function edit(Event $event, EventFolder $folder)
    {
        return view('admin.event-folders.edit', compact('event', 'folder'));
    }

    public function update(Request $request, Event $event, EventFolder $folder)
    {
        $request->validate([
            'image' => 'nullable|image',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $folder->image_path = $request->file('image')->store('event_images', 'public');
        }

        $folder->description = $request->description;
        $folder->save();

        return redirect()->route('admin.event-folders.index', $event->id)
                        ->with('success', 'Event Folder updated successfully!');
    }
}
