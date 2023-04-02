<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\TripController;

Route::post("/possibleTrips", [TripController::class, "showPossibleTrips"])->name("possibleTrips");