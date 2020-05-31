<?php

use App\Http\Controllers\TripAdvisorScrapperController;
use App\Http\Controllers\TripAdvisorSentimentController;
use App\Model\Airline;
use App\Model\TripAdvisor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //MAD
        DB::table('airlines')->insert([
            'tripadvisor_code' => 8729089,
            'name' => 'Iberia',
            'tripadvisor_name' => 'Iberia',
            'aena_name' => 'IBERIA'
        ]);
        DB::table('airlines')->insert([
            'tripadvisor_code' => 10823588,
            'name' => 'Iberia Express',
            'tripadvisor_name' => 'Iberia-Express',
            'aena_name' => 'IBERIA EXPRESS'
        ]);

        //BCN
        DB::table('airlines')->insert([
            'tripadvisor_code' => 8729113,
            'name' => 'Lufthansa',
            'tripadvisor_name' => 'Lufthansa',
            'aena_name' => 'LUFTHANSA'
        ]);
        DB::table('airlines')->insert([
            'tripadvisor_code' => 8729089,
            'name' => 'Iberia',
            'tripadvisor_name' => 'Iberia',
            'aena_name' => 'IBERIA'
        ]);
    }
}
