<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trip form</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
        <h1>Trip-builder</h1>
        <form action="{{ route("possibleTrips") }}" method="POST">
            @csrf
            <h3>Tailor your trip!</h3>

            <label for="departure_airport">From: </label>
            <select name="departure_airport" id="">
                @for ($i = 0; $i < count($airports); $i++)
                <option value="{{ $airports[$i]["code"] }}">{{ $airports[$i]["city"]. "(" .$airports[$i]["country_code"]. ") " .$airports[$i]["name"]. "(" .$airports[$i]["code"]. ")" }}</option>
                @endfor
            </select>
            <br>
            <br>

            <label for="arrival_airport">To: </label>
            <select name="arrival_airport" id="">
                @for ($i = 0; $i < count($airports); $i++)
                <option value="{{ $airports[$i]["code"] }}">{{ $airports[$i]["city"]. "(" .$airports[$i]["country_code"]. ") " .$airports[$i]["name"]. "(" .$airports[$i]["code"]. ")" }}</option>
                @endfor 
            </select>
            <br>
            <br>
            
            <label for="departure_date">Departure date</label>
            <input type="date" name="departure_date" required>
            <br>
            <br>

            @if ($tripType == "roundtrip")
            <label for="return_date">Return date</label>
            <input type="date" name="return_date" required>
            <br>
            <br>
            @endif

            <input type="text" name="trip_type" id="" hidden value="{{ $tripType }}">
            <button type="submit">Continue</button>
        </form>
        <hr>
        <a href="{{ route("home") }}">Go back to home page</a>
    </body>
</html>