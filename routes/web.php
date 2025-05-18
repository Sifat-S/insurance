<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShortCodeController;
use App\Http\Middleware\IsAdmin;

// Auth routes (login, register, etc.)
Auth::routes();

// Redirect root URL based on authentication status
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('owners.index')
        : redirect()->route('login');
});

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Resource routes for owners and cars
Route::resource('owners', OwnerController::class)->middleware('auth');
Route::resource('cars', CarController::class)->middleware('auth');


Route::resource('shortcodes', ShortCodeController::class)->only('index')->middleware('auth');
Route::resource('shortcodes', ShortCodeController::class)->only(['destroy', 'create', 'store', 'edit', 'update'])->middleware(IsAdmin::class);
