<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\TripController;

Route::post("/possibleTrips", [TripController::class, "tripValidation"])->name("possibleTrips");