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
                                <li class="active">Cars</li>
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
                                <h3 class="font-weight-bold">CARS</h3>
                            </div>
                            <div class="clearfix">
                                <a href="/add-car" class="btn btn-info float-right">Add car</a>
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
                                    <th>CarID</th>
                                    <th>Model</th>
                                    <th>Plate Number</th>
                                    <th>Color</th>
                                    <th>Manufacture Year</th>
                                    <th>Active</th>
                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($cars as $car)
                                        <tr>
                                            <td>{{$car->car_id}}</td>
                                            <td>{{$car->getCarModel->carmodel_name}}</td>
                                            <td>{{$car->car_plate}}</td>
                                            <td>{{$car->car_color}}</td>
                                            <td>{{$car->manufacture_year}}</td>
                                            <td>{{\App\Car::$_StatusLabel[$car->active]}}</td>
                                            <td><a href="{{url("edit-car?id=".$car->car_id)}}">Edit</a></td>
                                            <td>
                                                <a onclick="return confirm('Are you sure?')"
                                                   href="{{url("delete-car/".$car->car_id)}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $cars->links("navigation") !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
