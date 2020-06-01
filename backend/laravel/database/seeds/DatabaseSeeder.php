<?php

use App\Model\Aena;
use App\Model\Data;
use App\Model\FlightData;
use App\Model\TripAdvisor;
use App\Model\TuTiempo;
use App\Model\WeatherData;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Data::truncate();
        WeatherData::truncate();
        FlightData::truncate();
        Aena::truncate();
        TuTiempo::truncate();


        $this->call(AdministratorSeeder::class);
        $this->call(AirportSeeder::class);
        $this->call(AirlineSeeder::class);
        $this->call(AirportAirlinesSeeder::class);
    }
}
