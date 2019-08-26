<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\CarModel::class,100)->create();
        //factory(App\Customer::class,100)->create();
        //factory(App\Driver::class,100)->create();
        //factory(App\Car::class,100)->create();
        factory(App\Booking::class,100)->create();
    }
}
