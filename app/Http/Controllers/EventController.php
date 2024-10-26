<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Attendee;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('event.index', compact('events'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $attendees = Attendee::all();
        return view('event.create', compact('categories', 'attendees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            // 'attendee_id' => 'required|array', // Ensure it's an array
            // 'attendee_id.*' => 'exists:attendees,id', // Validate each ID in the array
        ]);

        // Create the event
        $event = Event::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'date' => $validatedData['date'],
            'location' => $validatedData['location'],
            'category_id' => $validatedData['category_id'],
        ]);

        // Attach the attendees if attendee_id is provided
        if (isset($validatedData['attendee_id'])) {
            $event->attendees()->attach($validatedData['attendee_id']);
        }


        return redirect()->route('events.index')->with('success', 'Event created successfully with attendees.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        $attendees = $event->attendees;
        // dd($attendees);
        return view('event.show', compact('event', 'attendees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);
        $categories = Category::all();
        $attendees = Attendee::all();
        return view('event.edit', compact('event', 'categories', 'attendees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'attendee_id' => 'array',  // Validate as an array
            'attendee_id.*' => 'exists:attendees,id' // Validate each ID in the array
        ]);

        $event = Event::findOrFail($id);
        $event->update($validatedData);

        // Sync attendees with the event if attendee_id is provided
        if (isset($validatedData['attendee_id'])) {
            $event->attendees()->sync($validatedData['attendee_id']);
        } else {
            $event->attendees()->sync([]);
        }

        return redirect()->route('events.index')->with('success', 'Event updated successfully with attendees.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->attendees()->detach();
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully with attendees.');
    }
}
