<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;
use App\Models\Event;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendees = Attendee::all();
        return view('attendee.index', compact('attendees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::all();
        return view('attendee.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $attendee = new Attendee();
        $attendee->name = $validatedData['name'];
        $attendee->email = $validatedData['email'];
        $attendee->event_id = $request->event_id;
        $attendee->save();

        return redirect()->route('attendee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendee = Attendee::find($id);
        return view('attendee.show', compact('attendee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendee = Attendee::find($id);
        $events = Event::all();
        return view('attendee.edit', compact('attendee', 'events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $attendee = Attendee::find($id);
        $attendee->name = $validatedData['name'];
        $attendee->email = $validatedData['email'];
        $attendee->event_id = $request->event_id;
        $attendee->save();

        return redirect()->route('attendee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendee = Attendee::find($id);
        $attendee->delete();

        return redirect()->route('attendee.index');
    }
}
