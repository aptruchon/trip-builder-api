<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function showTripForm(Request $request)
    {
        $tripType = $request->input('trip-type');

        return view('tripForm', [
            'tripType' => $tripType,
            'airports' => Airport::all()
        ]);
    }
}
