<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\EventController;

Route::get('/events', [EventController::class, 'index']);            // GET all events
Route::get('/events/{id}', [EventController::class, 'show']);        // GET single event by ID
Route::post('/events', [EventController::class, 'store']);           // POST create new event
Route::put('/events/{id}', [EventController::class, 'update']);      // PUT update event by ID
Route::delete('/events/{id}', [EventController::class, 'destroy']);  // DELETE event by ID

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
