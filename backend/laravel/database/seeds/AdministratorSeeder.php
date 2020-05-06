<?php

use Illuminate\Database\Seeder;
use App\Administrator;

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
            Users::destroy($administrator->id);
            Administrator::destroy($administrator->id);
        });
        factory(Administrator::class, 50)->create();
    }
}
