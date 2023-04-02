<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('index');
})->name("home");

Route::post('/tripForm', [FormController::class, "showTripForm"])->name("tripForm");
