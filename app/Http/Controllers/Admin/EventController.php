<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    protected $prefix;
    public function __construct(){
        $this->prefix = 'admin.events.';
        // parent::__construct('Role');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Event::all();
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
            'event_date' => 'required|date',
            'event_time' => 'required',
            'place' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Single image
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Multiple images
        ]);

        // Create the event
        $event = Event::create($validated);

        // Handle single image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $event->update(['image' => $imagePath]);
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('event_images', 'public');
                $event->images()->create(['image' => $imagePath]);
            }
        }

        return redirect()->route($this->prefix.'index')->with('success', 'Event created successfully.');
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
    public function edit($id)
    {
        $event = Event::find($id);
        return view($this->prefix.'edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'place' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Single image
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Multiple images
        ]);

        // Update the event
        $event->update($validated);

        // Handle single image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $event->update(['image' => $imagePath]);
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('event_images', 'public');
                $event->images()->create(['image' => $imagePath]);
            }
        }

        return redirect()->route($this->prefix.'index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route($this->prefix.'index')->with('success', 'Event deleted successfully.');
    }



}
