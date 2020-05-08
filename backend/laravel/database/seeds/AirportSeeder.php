<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->insert([
            'code' => 'MAD',
            'location' => 'madrid-barajas',
        ]);
        DB::table('airports')->insert([
            'code' => 'BCN',
            'location' => 'el-prat-de-llobregat',
        ]);
        DB::table('airports')->insert([
            'code' => 'TFN',
            'location' => 'san-cristobal-de-la-laguna', 
        ]);
        DB::table('airports')->insert([
            'code' => 'PMI',
            'location' => 'palma-de-mallorca', 
        ]);
        DB::table('airports')->insert([
            'code' => 'SVQ',
            'location' => 'sevilla', 
        ]);
        DB::table('airports')->insert([
            'code' => 'GRX',
            'location' => 'chauchina', 
        ]);
        DB::table('airports')->insert([
            'code' => 'LPA',
            'location' => 'las-palmas-de-gran-canaria', 
        ]);
        DB::table('airports')->insert([
            'code' => 'ACE',
            'location' => 'lanzarote-aeropuerto', 
        ]);
        DB::table('airports')->insert([
            'code' => 'TFS',
            'location' => 'santa-cruz-de-tenerife', 
        ]);
        DB::table('airports')->insert([
            'code' => 'BIO',
            'location' => 'loiu', 
        ]);
    }
}