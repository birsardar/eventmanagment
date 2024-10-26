<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Fetch events with category
            $events = Event::with('category')->get();

            if ($events->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No events found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Events retrieved successfully',
                'data' => $events
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving events',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $event = Event::create($validated);
        if ($event) {
            return response()->json([
                'success' => true,
                'message' => 'Event created successfully',
                'data' => $event
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Event could not be created'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::with('category')->find($id);

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Event retrieved successfully',
            'data' => $event
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'date' => 'date',
            'location' => 'string',
            'category_id' => 'exists:categories,id'
        ]);
        if ($event->update($validated)) {
            return response()->json([
                'success' => true,
                'message' => 'Event updated successfully',
                'data' => $event
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Event could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        if ($event->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Event deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Event could not be deleted'
            ], 500);
        }
    }
}
