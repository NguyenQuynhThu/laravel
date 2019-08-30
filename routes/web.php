<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//View
Route::get("/view-car", "UserController@carList");
Route::get("/view-carmodel", "UserController@carmodelList");
Route::get("/view-booking", "UserController@bookingList");
Route::get("/view-customer", "UserController@customerList");
Route::get("/view-driver", "UserController@driverList");

//Add
Route::get("/add-carmodel", "UserController@addCarmodel");
Route::post("/add-carmodel", "UserController@saveCarmodel");

Route::get("/add-car", "UserController@addCar");
Route::post("/add-car", "UserController@saveCar");

Route::get("/add-booking", "UserController@addBooking");
Route::post("/add-booking", "UserController@saveBooking");

Route::get("/add-customer", "UserController@addCustomer");
Route::post("/add-customer", "UserController@saveCustomer");

Route::get("/add-driver", "UserController@addDriver");
Route::post("/add-driver", "UserController@saveDriver");

//Edit
Route::get("/edit-car","DemoController@editCar");
Route::post("/edit-car","DemoController@updateCar");

//Delete
Route::get("/delete-car/{id}","DemoController@deleteCar");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
