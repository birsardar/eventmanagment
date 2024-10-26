<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AttendeeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/auth/register', [UserController::class, 'createUser'])->name('auth.register');
Route::post('/auth/login', [UserController::class, 'loginUser'])->name('auth.login');

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('events', EventController::class);
    Route::get('/events', [EventController::class, 'index']);            // GET all events
    Route::get('/events/{id}', [EventController::class, 'show']);        // GET single event by ID
    Route::post('/events', [EventController::class, 'store'])->name('events.store');           // POST create new event
    Route::put('/events/{id}', [EventController::class, 'update']);      // PUT update event by ID
    Route::delete('/events/{id}', [EventController::class, 'destroy']);  // DELETE event by ID
    Route::apiResource('categories', CategoryController::class);
    Route::get('/categories', [CategoryController::class, 'index']);       // GET all categories
    Route::get('/categories/{id}', [CategoryController::class, 'show']);   // GET single category by ID
    Route::post('/categories', [CategoryController::class, 'store']);      // POST create new category
    Route::put('/categories/{id}', [CategoryController::class, 'update']); // PUT update category by ID
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']); // DELETE category by ID
    Route::apiResource('attendees', AttendeeController::class);
    Route::get('/attendees', [AttendeeController::class, 'index']);       // GET all attendees
    Route::get('/attendees/{id}', [AttendeeController::class, 'show']);   // GET single attendee by ID
    Route::post('/attendees', [AttendeeController::class, 'store']);      // POST create new attendee
    Route::put('/attendees/{id}', [AttendeeController::class, 'update']); // PUT update attendee by ID
    Route::delete('/attendees/{id}', [AttendeeController::class, 'destroy']); // DELETE attendee by ID
});
