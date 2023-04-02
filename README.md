# Trip-builder API
Very basic API using the Laravel framework and MySql as DB

## Installation
To install everything, just follow the next steps:
- Download the content of the repository
- In your terminal, in the trip-builder-app repository, run composer install
- Once the dependencies are installed, run php artisan migrate to create the database and the tables
- Then you can run php artisan db:seed to do the insertion in those tables

## Use the API
To try the API you can either access it with your browser
- Run php artisan serve, hold control key and click on the IP address
- Use the form to make a request

Or you can use a tool like Postman locally
- Run php artisan serve, copy the URL of the server and go in your postman workspace
- Select POST as a method
- Copy the URL given by your terminal and this route: /api/possibleTrips Here's an example: 127.0.0.1:8000/api/possibleTrips
- Under the body tab, select the option "raw" in the radio buttons and JSON in the select menu
- Copy the follwing data in the text area and press SEND on the request

One-way trip :
{
"departure_airport": "YUL",
"arrival_airport": "YVR",
"departure_date": "2021-02-01",
"trip_type": "one-way"
}

Round-trip:
{
"departure_airport": "YUL",
"arrival_airport": "YVR",
"departure_date": "2021-02-01",
"return_date": "2021-02-20",
"trip_type": "round-trip"
}

N.B. THe DB is very light. You can exchange the airports but not try for an other one as they don't exists. (There is still validation if you try)