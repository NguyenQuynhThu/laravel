<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(factory(App\CarModel::class,20)->create());
        //$this->call(factory(App\Car::class, 50)->create());
        //$this->call(factory(App\Customer::class,50)->create());
        //$this->call(factory(App\Driver::class,30)->create());
        $this->call(factory(App\Booking::class,100)->create());
    }
}
