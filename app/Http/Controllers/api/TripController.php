<?php

namespace App\Http\Controllers\api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{
    public function tripValidation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "departure_airport" => "required|string|max:3",
            "arrival_airport" => "required|string|max:3|different:departure_airport",
            "departure_date" => "required|string|max:10|date_format:Y-m-d",
            "return_date" => [
                "string",
                "max:10",
                "date_format:Y-m-d",
                "after:departure_date",
            ],
            "trip_type" => "required|string|in:one-way,round-trip",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 422,
                "errors" => $validator->messages()
            ]);
        }

        return $this->showPossibleTrips($request);
    }

    public function showPossibleTrips(Request $request)
    {
        $tripType = $request['trip_type'];
        $departureFlight = Flight::all()->where("departure_airport", $request["departure_airport"])->first();

        if (!isset($departureFlight)) {
            return response()->json([
                "status" => 422,
                "errors" => "No flights were found"
            ]);
        }

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
            "trips" => $trips
        ]);
    }
}
