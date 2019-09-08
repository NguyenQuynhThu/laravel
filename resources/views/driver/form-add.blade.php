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
                                <li class="active"><a href="/view-driver">Drivers</a></li>
                                <li class="active">Add Driver</li>
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
                                <h3 class="font-weight-bold">ADD DRIVER</h3>
                            </div>
                        </div>

                        <div class="p-4">
                            <form action="{{url("/add-driver")}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="driver_name"
                                           value="{{old("driver_name")}}"
                                           placeholder="Driver Name">
                                    @if($errors->has("driver_name"))
                                        <p class="error" style="color: red">{{$errors->first("driver_name")}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" name="driver_phone"
                                           value="{{old("driver_phone")}}"
                                           placeholder="Driver Phone">
                                    @if($errors->has("driver_phone"))
                                        <p class="error" style="color: red">{{$errors->first("driver_phone")}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>License</label>
                                    <input class="form-control" type="text" name="driver_license"
                                           value="{{old("driver_license")}}"
                                           placeholder="Driver License">
                                    @if($errors->has("driver_license"))
                                        <p class="error" style="color: red">{{$errors->first("driver_license")}}</p>
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
