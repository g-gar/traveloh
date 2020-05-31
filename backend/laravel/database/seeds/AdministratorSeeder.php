<?php

use Illuminate\Database\Seeder;
use App\Model\Administrator;
use App\Model\User;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrator::all()->unique()->each(function(Administrator $administrator) {
            User::destroy($administrator->id);
            Administrator::destroy($administrator->id);
        });
        factory(Administrator::class, 5)->create();
    }
}
