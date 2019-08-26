<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\CarModel::class, function (Faker $faker) {
    return [
        'carmodel_name' => $faker->unique()->company,
    ];
});

$factory->define(\App\Car::class, function (Faker $faker) {
    return [
        'carmodel_id' => $faker->randomFloat(0,1,100),
        'car_plate' => $faker->buildingNumber,
        'car_color' => $faker->colorName,
        'manufacture_year' => $faker->year,
    ];
});

$factory->define(\App\Customer::class, function (Faker $faker){
    return [
        'customer_name' => $faker->firstName,
        'customer_email' => $faker->email,
        'customer_phone' => $faker->phoneNumber,
        'customer_address' => $faker->address,
        'customer_license' => $faker->bankAccountNumber,
    ];
});

$factory->define(\App\Driver::class, function (Faker $faker){
    return [
        'driver_name' => $faker->lastName,
        'driver_phone' => $faker->phoneNumber,
        'driver_license' => $faker->phoneNumber,
    ];
});

$factory->define(\App\Booking::class, function (Faker $faker){
    return [
        'customer_id' => $faker->randomFloat(0,1,100),
        'car_id' => $faker->randomFloat(0,1,100),
        'driver_id' => $faker->randomFloat(0,1,100),
        'pickup_date' => $faker->dateTime,
        'drop_date' => $faker->dateTime,
        'total' => $faker->numberBetween(10000,90000),
    ];
});


