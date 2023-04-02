<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flights')->insert([
            [
                'airline' => 'AC',
                'number' => 301,
                'departure_airport' => 'YUL',
                'departure_time' => '07:35',
                'arrival_airport' => 'YVR',
                'arrival_time' => '10:05',
                'price' => 273.23
            ],
            [
                'airline' => 'AC',
                'number' => 302,
                'departure_airport' => 'YVR',
                'departure_time' => '11:30',
                'arrival_airport' => 'YUL',
                'arrival_time' => '19:11',
                'price' => 220.63
            ]
        ]);
    }
}
