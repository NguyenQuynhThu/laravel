@extends("layout")
@section("main-content")
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Table</a></li>
                                <li class="active"><a href="/view-booking">Bookings</a></li>
                                <li class="active">Add Booking</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-sm-6">
                                <h3 class="font-weight-bold">ADD BOOKING</h3>
                            </div>
                        </div>

                        <div class="p-4">
                            <form action="{{url("/add-booking")}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Customer</label>
                                    <select name="customer_id" class="form-control">
                                        @foreach($customers as $customer)
                                            <option value="{{$customer->customer_id}}"
                                                    @if($customer->customer_id == old("customer_id")) selected @endif>
                                                {{$customer -> customer_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Car</label>
                                    <select name="car_id" class="form-control">
                                        @foreach($cars as $car)
                                            <option value="{{$car->car_id}}"
                                                    @if($car->car_id == old("car_id")) selected @endif>
                                                {{$car -> car_plate}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Driver</label>
                                    <select name="driver_id" class="form-control">
                                        @foreach($drivers as $driver)
                                            <option value="{{$driver->driver_id}}"
                                                    @if($driver->driver_id == old("driver_id")) selected @endif>
                                                {{$driver -> driver_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pickup Date</label>
                                    <input class="form-control" type="text" name="pickup_date"
                                           value="{{old("pickup_date")}}"
                                           placeholder="Pickup Date">
                                    @if($errors->has("pickup_date"))
                                        <p class="error" style="color: red">{{$errors->first("pickup_date")}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Drop Date</label>
                                    <input class="form-control" type="text" name="drop_date"
                                           value="{{old("drop_date")}}"
                                           placeholder="Drop Date">
                                    @if($errors->has("drop_date"))
                                        <p class="error" style="color: red">{{$errors->first("drop_date")}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Total</label>
                                    <input class="form-control" type="text" name="total"
                                           value="{{old("total")}}"
                                           placeholder="Total">
                                    @if($errors->has("total"))
                                        <p class="error" style="color: red">{{$errors->first("total")}}</p>
                                    @endif
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
