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
                                <li><a href="/#">Table</a></li>
                                <li class="active">Bookings</li>
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
                                <h3 class="font-weight-bold">BOOKINGS</h3>
                            </div>
                            <div class="clearfix">
                                <a href="/add-booking" class="btn btn-info float-right">Add booking</a>
                                @if(Session::has("success"))
                                    <p style="color: green">{{Session::get("success")}}</p>
                                @endif
                                @if($errors->has("fail"))
                                    <p style="color: red">{{$errors->first("fail")}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <table class="table table-hover" id="bootstrap-data-table"
                                       class="table table-striped table-bordered">
                                    <thead>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Car</th>
                                    <th>Driver</th>
                                    <th>Pickup Date</th>
                                    <th>Drop Date</th>
                                    <th>Total</th>
                                    <th>Active</th>
                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{$booking->booking_id}}</td>
                                            <td>{{$booking->getCustomer->customer_name}}</td>
                                            <td>{{$booking->getCar->car_plate}}</td>
                                            <td>{{$booking->getDriver->driver_name}}</td>
                                            <td>{{$booking->pickup_date}}</td>
                                            <td>{{$booking->drop_date}}</td>
                                            <td>{{$booking->total}}</td>
                                            <td>{{\App\Car::$_StatusLabel[$booking->active]}}</td>
                                            <td><a href="{{url("edit-booking?id=".$booking->booking_id)}}">Edit</a></td>
                                            <td>
                                                <a onclick="return confirm('Are you sure?')"
                                                   href="{{url("delete-booking/".$booking->booking_id)}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $bookings->links("navigation") !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
