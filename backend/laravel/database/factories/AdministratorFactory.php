<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Model\User;
use App\Model\Administrator;

$factory->define(Administrator::class, function (Faker $faker) {
    $users = factory(User::class,1)->create();
    return [
        'id' => $users->first()->id,
        'username' => $faker->name,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'email' => $faker->unique()->safeEmail,
        'token' => Str::random(10)
    ];
});
