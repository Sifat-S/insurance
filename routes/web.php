<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/index', function () {
    return view('owners.index');
});
Route::get('/', [OwnerController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('owners', OwnerController::class);
Route::resource('cars', CarController::class);


#Auth::routes();

#Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
