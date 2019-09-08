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
                                <li class="active"><a href="/view-car">Cars</a></li>
                                <li class="active">Add Car</li>
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
                                <h3 class="font-weight-bold">ADD CAR</h3>
                            </div>
                        </div>

                        <div class="p-4">
                            <form action="{{url("/add-car")}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Model</label>
                                    <select name="carmodel_id" class="form-control">
                                        @foreach($carmodels as $carmodel)
                                            <option value="{{$carmodel->carmodel_id}}"
                                                    @if($carmodel->carmodel_id == old("carmodel_id")) selected @endif>
                                                {{$carmodel -> carmodel_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Plate Number</label>
                                    <input class="form-control" type="text" name="car_plate"
                                           value="{{old("car_plate")}}"
                                           placeholder="Plate Number">
                                    @if($errors->has("car_plate"))
                                        <p class="error" style="color: red">{{$errors->first("car_plate")}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Color</label>
                                    <input class="form-control" type="text" name="car_color"
                                           value="{{old("car_color")}}"
                                           placeholder="Color">
                                    @if($errors->has("car_color"))
                                        <p class="error" style="color: red">{{$errors->first("car_color")}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Manufacture Year</label>
                                    <input class="form-control" type="text" name="manufacture_year"
                                           value="{{old("manufacture_year")}}"
                                           placeholder="Manufacture Year">
                                    @if($errors->has("manufacture_year"))
                                        <p class="error" style="color: red">{{$errors->first("manufacture_year")}}</p>
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
