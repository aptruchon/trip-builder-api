<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;

class FormController extends Controller
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