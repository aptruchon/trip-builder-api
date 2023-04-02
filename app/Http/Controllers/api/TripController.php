<?php

namespace App\Http\Controllers\api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TripController extends Controller
{
    public function showPossibleTrips(Request $request)
    {
        // dump($request);
        $tripType = $request['trip_type'];
        $departureFlight = Flight::all()->where("departure_airport", $request["departure_airport"])->first();

        if($tripType == "round-trip")
        {
            $returnFlight = Flight::all()->where("departure_airport", $departureFlight["arrival_airport"])->first();
        }

        $flightA["airline"] = $departureFlight["airline"];
        $flightA["number"] = $departureFlight["number"];
        $flightA["departure_airport"] = $departureFlight["departure_airport"];
        $flightA["departure_datetime"] = $request["departure_date"]. " " .$departureFlight["departure_time"];
        $flightA["arrival_airport"] = $departureFlight["arrival_airport"];
        $flightA["arrival_datetime"] = $request["departure_date"]. " " .$departureFlight["arrival_time"];
        $flightA["price"] = $departureFlight["price"];

        $trip["price"] = $flightA["price"];
        $trip["flights"] = [$flightA];
        
        if(isset($returnFlight))
        {
            $flightB["airline"] = $returnFlight["airline"];
            $flightB["number"] = $returnFlight["number"];
            $flightB["departure_airport"] = $returnFlight["departure_airport"];
            $flightB["departure_datetime"] = $request["departure_date"]. " " .$returnFlight["departure_time"];
            $flightB["arrival_airport"] = $returnFlight["arrival_airport"];
            $flightB["arrival_datetime"] = $request["departure_date"]. " " .$returnFlight["arrival_time"];
            $flightB["price"] = $returnFlight["price"];

            array_push($trip["flights"], $flightB);
            $trip["price"] += $flightB["price"];
        }

        $trips = [
            "price" => $trip["price"],
            "flights" => $trip["flights"]
        ];

        return response()->json([
            "trips" => $trips,
        ]);
    }
}
