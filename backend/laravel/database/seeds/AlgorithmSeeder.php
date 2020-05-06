<?php

use Illuminate\Database\Seeder;
use App\Algorithm;

class AlgorithmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Algorithm::truncate();
        factory(Algorithm::class)->create([
            'name' => 'Redes neuronales'
        ]);
        factory(Algorithm::class)->create([
            'name' => 'Árboles de decision'
        ]);
    }
}
