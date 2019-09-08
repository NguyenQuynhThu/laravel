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
                                <li class="active">Car Models</li>
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
                                <h3 class="font-weight-bold">CAR MODELS</h3>
                            </div>
                            <div class="clearfix">
                                <a href="/add-carmodel" class="btn btn-info float-right">Add Model</a>
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
                                    <th>Model Name</th>
                                    <th>Quantity</th>
                                    <th>Active</th>
                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($carmodels as $carmodel)
                                        <tr>
                                            <td>{{$carmodel->carmodel_id}}</td>
                                            <td>{{$carmodel->carmodel_name}}</td>
                                            <td>{{$carmodel->get_car_qty_count}}</td>
                                            <td>{{\App\CarModel::$_StatusLabel[$carmodel->active]}}</td>
                                            <td><a href="{{url("edit-carmodel?id=".$carmodel->carmodel_id)}}">Edit</a></td>
                                            <td>
                                                <a onclick="return confirm('Are you sure?')"
                                                   href="{{url("delete-carmodel/".$carmodel->carmodel_id)}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $carmodels->links("navigation") !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
