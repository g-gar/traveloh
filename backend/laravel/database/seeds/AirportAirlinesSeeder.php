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
        $ids = [1,2,3];
        foreach($ids as $id) {
            $temp = new AirportAirline([
                'id_airport' => 1,
                'id_airline' => $id
            ]);
            $temp->save();
        }
    }
}
