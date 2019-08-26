<?php


namespace App\Http\Controllers;


use App\Car;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function carList(){
        $cars = Car::leftJoin("carmodel", "car.carmodel_id","=","carmodel.carmodel_id")
        ->paginate(10,["car.car_id","carmodel.carmodel_name","car.car_plate","car.car_color","car.manufacture_year","car.active"]);

        return view("car.list", compact("cars"));
    }
}
