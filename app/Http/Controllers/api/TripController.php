<?php

namespace App\Http\Controllers\api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TripController extends Controller
{
    public function showPossibleTrips(Request $request)
    {
        $tripType = $request['trip_type'];
        $departureFlight = Flight::all()->where("departure_airport", $request["departure_airport"]);

        if($tripType == "roundtrip")
        {
            $returnFlight = Flight::all()
                ->where("departure_airport", $departureFlight[0]["arrival_airport"])
                ->where("departure_time", ">", $departureFlight[0]["arrival_time"]);

            dump($returnFlight);
        }
        dump($departureFlight);

        return view('index');
    }
}
