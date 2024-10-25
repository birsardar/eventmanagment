<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
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


Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/events', 'event.index')->name('events');
Route::view('/events/create', 'event.create')->name('events.create');
Route::view('/events/edit', 'event.edit')->name('events.edit');
Route::view('/events/show', 'event.show')->name('events.show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
