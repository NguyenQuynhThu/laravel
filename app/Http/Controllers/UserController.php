<?php


namespace App\Http\Controllers;

use App\Booking;
use App\Car;
use App\CarModel;
use App\Customer;
use App\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Cac ham view
    public function carList()
    {
        $cars = Car::where("active",1)
            ->with("getCarModel")
            ->paginate(20);
        return view("car.list", compact("cars"));
    }

    public function carmodelList()
    {
        $carmodels = CarModel::orderBy("carmodel_name", "ASC")
            ->paginate(20);

        return view("carmodel.list", compact("carmodels"));
    }

    public function bookingList()
    {
        $bookings = Booking::leftJoin("car", "booking.car_id", "=", "car.car_id")
            ->leftJoin("customer", "booking.customer_id", "=", "customer.customer_id")
            ->leftJoin("driver", "booking.driver_id", "=", "driver.driver_id")
            ->paginate(20, ["booking.booking_id", "customer.customer_name as customer_id",
                "car.car_plate as car_id", "driver.driver_name as driver_id",
                "booking.pickup_date", "booking.drop_date", "booking.total", "booking.active"]);

        return view("booking.list", compact("bookings"));
    }

    public function customerList()
    {
        $customers = Customer::orderBy("customer_name", "ASC")
            ->paginate(20);

        return view("customer.list", compact("customers"));
    }

    public function driverList()
    {
        $drivers = Driver::orderBy("driver_name", "ASC")
            ->paginate(20);

        return view("driver.list", compact("drivers"));
    }

    //Cac ham add
    public function addCar()
    {
        $carmodels = CarModel::orderBy("carmodel_name", "ASC")->get();

        return view("car.form-add", compact('carmodels'));
    }

    public function saveCar(Request $request)
    {
        $rules = [
            "carmodel_id" => "required|numeric",
            "car_plate" => "required|string|max:255|unique:car",
            "car_color" => "required|string|max:255",
            "manufacture_year" => "required|numeric",
        ];
        $this->validate($request, $rules);
        try {
            Car::create([
                "carmodel_id" => $request->get("carmodel_id"),
                "car_plate" => $request->get("car_plate"),
                "car_color" => $request->get("car_color"),
                "manufacture_year" => $request->get("manufacture_year")
            ])->save();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return redirect("/view-car");
    }

    public function addCarmodel()
    {
        return view("carmodel.form-add");
    }

    public function saveCarmodel(Request $request)
    {
        $rules = [
            "carmodel_name" => "required|string|max:255|unique:carmodel"
        ];
        $this->validate($request, $rules);
        try {
            CarModel::create([
                "carmodel_name" => $request->get("carmodel_name"),
            ])->save();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return redirect("/view-carmodel");
    }


}
