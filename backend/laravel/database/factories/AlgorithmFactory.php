<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Algorithm;

$factory->define(Algorithm::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
