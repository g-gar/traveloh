<?php

use Illuminate\Database\Seeder;
use App\Model\Airport;
use Illuminate\Support\Facades\DB;

class AirportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->insert([
            'name' => 'MAD',
            'location' => 'madrid-barajas',
        ]);
    }
}