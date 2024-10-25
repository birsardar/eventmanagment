<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Api\UserController;
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
});
