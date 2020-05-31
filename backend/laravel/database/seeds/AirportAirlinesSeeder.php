<?php

use App\Model\AirportAirline;
use Illuminate\Database\Seeder;

class AirportAirlinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = [1,2];
        foreach($ids as $id) {
            $temp = new AirportAirline([
                'id_airport' => 1,
                'id_airline' => $id
            ]);
            $temp->save();
        }

        $ids = [3,4];
        foreach($ids as $id) {
            $temp = new AirportAirline([
                'id_airport' => 2,
                'id_airline' => $id
            ]);
            $temp->save();
        }
    }
}
