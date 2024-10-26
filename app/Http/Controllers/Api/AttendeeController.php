<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendee;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Fetch categories
            $attendee = Attendee::all();

            if ($attendee->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No Attendee found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Attendee retrieved successfully',
                'data' => $attendee
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving categories',
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'event_id' => 'required|integer'

        ]);

        $attendee = Attendee::create($validated);
        if ($attendee) {
            return response()->json([
                'success' => true,
                'message' => 'Attendee created successfully',
                'data' => $attendee
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Attendee could not be created'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendee = Attendee::find($id);

        if (!$attendee) {
            return response()->json([
                'success' => false,
                'message' => 'attendee not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'attendee retrieved successfully',
            'data' => $attendee
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
        $attendee = Attendee::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:255',

        ]);
        if ($attendee->update($validated)) {
            return response()->json([
                'success' => true,
                'message' => 'Attendee updated successfully',
                'data' => $attendee
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Attendee could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendee = Attendee::findOrFail($id);

        if ($attendee->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Attendee deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Attendee could not be deleted'
            ], 500);
        }
    }
}
