<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accueil</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
        <h1>Trip-builder</h1>
        <form action="{{ route("tripForm") }}" method="POST">
            @csrf

            What type of trip are you looking for today?
            <label for="one-way">One way</label>
            <input type="radio" name="trip-type" id="one-way" value="one-way">
            <label for="round-trip">Round trip</label>
            <input type="radio" name="trip-type" id="2" value="round-trip">

            <button type="submit">Continuer</button>
        </form>
    </body>
</html>