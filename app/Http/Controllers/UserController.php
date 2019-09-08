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
        $cars = Car::where("active", 1)
            ->with("getCarModel")
            ->paginate(20);
        return view("car.list", compact("cars"));
    }

    public function carmodelList()
    {
        $carmodels = CarModel::orderBy("carmodel_name", "ASC")
            ->where("active", 1)
            ->withCount("getCarQty")
            ->paginate(20);
        //dd("$carmodels");

        return view("carmodel.list", compact("carmodels"));
    }

    public function bookingList()
    {
        $bookings = Booking::where("active", 1)
            ->with("getCustomer")
            ->with("getCar")
            ->with("getDriver")
            ->paginate(20);

        return view("booking.list", compact("bookings"));
    }

    public function customerList()
    {
        $customers = Customer::where("active",1)
            ->orderBy("customer_name", "ASC")
            ->paginate(20);

        return view("customer.list", compact("customers"));
    }

    public function driverList()
    {
        $drivers = Driver::where("active", 1)
            ->orderBy("driver_name", "ASC")
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
            "manufacture_year" => "required|numeric|min:4",
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

    public function addCustomer()
    {
        return view("customer.form-add");
    }

    public function saveCustomer(Request $request)
    {
        $rules = [
            "customer_name" => "required|string|max:255",
            "customer_email" => "required|string|max:25|email",
            "customer_phone" => "required|string|max:255",
            "customer_address" => "required|string|max:255",
            "customer_license" => "nullable|string|max:255|unique:customer",
        ];
        $this->validate($request, $rules);
        try {
            Customer::create([
                "customer_name" => $request->get("customer_name"),
                "customer_email" => $request->get("customer_email"),
                "customer_phone" => $request->get("customer_phone"),
                "customer_address" => $request->get("customer_address"),
                "customer_license" => $request->get("customer_license"),
            ])->save();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return redirect("/view-customer");
    }

    public function addDriver()
    {
        return view("driver.form-add");
    }

    public function saveDriver(Request $request)
    {
        $rules = [
            "driver_name" => "required|string|max:255",
            "driver_phone" => "required|string|max:255",
            "driver_license" => "required|string|max:255|unique:driver",
        ];
        $this->validate($request, $rules);
        try {
            Driver::create([
                "driver_name" => $request->get("driver_name"),
                "driver_phone" => $request->get("driver_phone"),
                "driver_license" => $request->get("driver_license"),
            ])->save();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return redirect("/view-driver");
    }

    public function addBooking()
    {
        $customers = Customer::orderBy("customer_name", "ASC")->get();
        $cars = Car::orderBy("car_plate", "ASC")->get();
        $drivers = Driver::orderBy("driver_name", "ASC")->get();

        return view("booking.form-add", compact('customers', 'cars', 'drivers'));
    }

    public function saveBooking(Request $request)
    {
        $rules = [
            "customer_id" => "required|numeric",
            "car_id" => "required|numeric",
            "driver_id" => "required|numeric",
            "pickup_date" => "required|date",
            "drop_date" => "required|date",
            "total" => "required|numeric",
        ];
        $this->validate($request, $rules);
        try {

            Booking::create([
                "customer_id" => $request->get("customer_id"),
                "car_id" => $request->get("car_id"),
                "driver_id" => $request->get("driver_id"),
                "pickup_date" => $request->get("pickup_date"),
                "drop_date" => $request->get("drop_date"),
                "total" => $request->get("total")
            ])->save();

        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return redirect("/view-booking");
    }

    //Cac ham edit
    public function editCar(Request $request)
    {
        $car_id = $request->get("id");
        $car = Car::find($car_id);
        $carmodels = CarModel::orderBy("carmodel_name", "ASC")->get();
        return view("car.form-edit", compact("car", 'carmodels'));
    }

    public function updateCar(Request $request)
    {
        $car = Car::find($request->get("car_id"));
        $rules = [
            "car_plate" => "required|string|max:255|unique:car,car_plate," . $car->car_id . ",car_id",
            "car_color" => "required|string|max:255",
            "manufacture_year" => "required|numeric|min:4",
            "carmodel_id" => "required|numeric",
        ];
        $this->validate($request, $rules);
        try {
            $car->update([
                "carmodel_id" => $request->get("carmodel_id"),
                "car_plate" => $request->get("car_plate"),
                "car_color" => $request->get("car_color"),
                "manufacture_year" => $request->get("manufacture_year"),
            ]);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return redirect("view-car");
    }

    public function editCarmodel(Request $request)
    {
        $carmodel_id = $request->get("id");
        $carmodel = CarModel::find($carmodel_id);
        return view("carmodel.form-edit", compact("carmodel"));
    }

    public function updateCarmodel(Request $request)
    {
        $carmodel = CarModel::find($request->get("carmodel_id"));
        $rules = [
            "carmodel_name" => "required|string|max:255|unique:carmodel",
        ];
        $this->validate($request, $rules);
        try {
            $carmodel->update([
                "carmodel_name" => $request->get("carmodel_name"),
            ]);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return redirect("view-carmodel");
    }

    public function editBooking(Request $request)
    {
        $booking_id = $request->get("id");
        $booking = Booking::find($booking_id);
        $customers = Customer::orderBy("customer_name", "ASC")->get();
        $cars = Car::orderBy("car_plate", "ASC")->get();
        $drivers = Driver::orderBy("driver_name", "ASC")->get();
        return view("booking.form-edit", compact("booking", 'customers', 'cars', 'drivers'));
    }

    public function updateBooking(Request $request)
    {
        $booking = Booking::find($request->get("booking_id"));
        $rules = [
            "customer_id" => "required|numeric",
            "car_id" => "required|numeric",
            "driver_id" => "required|numeric",
            "pickup_date" => "required|date",
            "drop_date" => "required|date",
            "total" => "required|numeric",
        ];
        $this->validate($request, $rules);
        try {
            $booking->update
            ([
                "customer_id" => $request->get("customer_id"),
                "car_id" => $request->get("car_id"),
                "driver_id" => $request->get("driver_id"),
                "pickup_date" => $request->get("pickup_date"),
                "drop_date" => $request->get("drop_date"),
                "total" => $request->get("total")
            ]);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return redirect("view-booking");
    }

    public function editCustomer(Request $request)
    {
        $customer_id = $request->get("id");
        $customer = Customer::find($customer_id);
        return view("customer.form-edit", compact("customer"));
    }

    public function updateCustomer(Request $request)
    {
        $customer = Customer::find($request->get("customer_id"));
        $rules = [
            "customer_name" => "required|string|max:255",
            "customer_email" => "required|string|max:25|email",
            "customer_phone" => "required|string|max:255",
            "customer_address" => "required|string|max:255",
            "customer_license" => "nullable|string|max:255|unique:customer, customer_license," .$customer->customer_id. ",customer_id",
        ];
        $this->validate($request, $rules);
        try {
            $customer->update([
                "customer_name" => $request->get("customer_name"),
                "customer_email" => $request->get("customer_email"),
                "customer_phone" => $request->get("customer_phone"),
                "customer_address" => $request->get("customer_address"),
                "customer_license" => $request->get("customer_license"),
            ]);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return redirect("view-customer");
    }

    public function editDriver(Request $request)
    {
        $driver_id = $request->get("id");
        $driver = Driver::find($driver_id);
        return view("driver.form-edit", compact("driver"));
    }

    public function updateDriver(Request $request)
    {
        $driver = Driver::find($request->get("driver_id"));
        $rules = [
            "driver_name" => "required|string|max:255",
            "driver_phone" => "required|string|max:255",
            "driver_license" => "required|string|max:255|unique:driver,driver_license," . $driver->driver_id. ",driver_id",
        ];
        $this->validate($request, $rules);
        try {
            $driver->update([
                "driver_name" => $request->get("driver_name"),
                "driver_phone" => $request->get("driver_phone"),
                "driver_license" => $request->get("driver_license"),
            ]);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return redirect("view-driver");
    }

    //Cac ham delete
    public function deleteCar($id)
    {
        $car = Car::find($id);
        try {
            $car->active = Car::DEACTIVE;
            $car->save();
        } catch (\Exception $e) {
            return redirect("view-car")->withErrors(["fail" => $e->getMessage()]);
        }
        return redirect("view-car")->with("success", "Delete successfully!");
    }

    public function deleteCarmodel($id)
    {
        $carmodel = CarModel::find($id);
        try {
            $carmodel->active = CarModel::DEACTIVE;
            $carmodel->save();
        } catch (\Exception $e) {
            return redirect("view-carmodel")->withErrors(["fail" => $e->getMessage()]);
        }
        return redirect("view-carmodel")->with("success", "Delete successfully!");
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);
        try {
            $customer->active = Customer::DEACTIVE;
            $customer->save();
        } catch (\Exception $e) {
            return redirect("view-customer")->withErrors(["fail" => $e->getMessage()]);
        }
        return redirect("view-customer")->with("success", "Delete successfully!");
    }

    public function deleteDriver($id)
    {
        $driver = Driver::find($id);
        try {
            $driver->active = Driver::DEACTIVE;
            $driver->save();
        } catch (\Exception $e) {
            return redirect("view-driver")->withErrors(["fail" => $e->getMessage()]);
        }
        return redirect("view-driver")->with("success", "Delete successfully!");
    }

    public function deleteBooking($id)
    {
        $booking = Booking::find($id);
        try {
            $booking->active = Booking::DEACTIVE;
            $booking->save();
        } catch (\Exception $e) {
            return redirect("view-booking")->withErrors(["fail" => $e->getMessage()]);
        }
        return redirect("view-booking")->with("success", "Delete successfully!");
    }


}
