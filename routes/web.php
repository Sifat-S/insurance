<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;

Route::get('/', function () {
    return redirect()->route('owners.index'); // Redirect to the owners list
});

Route::resource('owners', OwnerController::class);
