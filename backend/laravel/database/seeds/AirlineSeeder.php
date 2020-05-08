<?php

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
        DB::table('airlines')->insert([
            'tripadvisor_code' => 11831129,
            'name' => 'Aerolinea De Antioquía',
            'tripadvisor_name' => 'Aerolinea-De-Antioquia'
        ]);
        DB::table('airlines')->insert([
            'tripadvisor_code' => 8729069,
            'name' => 'Emirates',
            'tripadvisor_name' => 'Emirates'
        ]);
        DB::table('airlines')->insert([
            'tripadvisor_code' => 8729089,
            'name' => 'Iberia',
            'tripadvisor_name' => 'Iberia'
        ]);
    }
}
