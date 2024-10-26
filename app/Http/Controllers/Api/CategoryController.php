<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Fetch categories
            $categories = Category::all();

            if ($categories->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No categories found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Categories retrieved successfully',
                'data' => $categories
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

        ]);

        $categories = Category::create($validated);
        if ($categories) {
            return response()->json([
                'success' => true,
                'message' => 'Category created successfully',
                'data' => $categories
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category could not be created'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);

        if (!$categories) {
            return response()->json([
                'success' => false,
                'message' => 'Categories not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Categories retrieved successfully',
            'data' => $categories
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
        $categories = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:255',

        ]);
        if ($categories->update($validated)) {
            return response()->json([
                'success' => true,
                'message' => 'Categories updated successfully',
                'data' => $categories
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Categoies could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::findOrFail($id);

        if ($categories->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Categories deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Categories could not be deleted'
            ], 500);
        }
    }
}
