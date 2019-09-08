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
                                <li class="active"><a href="/view-carmodel">Car Models</a></li>
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
                                <h3 class="font-weight-bold">EDIT MODEL</h3>
                            </div>
                        </div>

                        <div class="p-4">
                            <form action="{{url("/edit-carmodel")}}" method="post">
                                @csrf
                                <input type="hidden" name="carmodel_id" value="{{$carmodel->carmodel_id}}">

                                <div class="form-group">
                                    <label>Model Name</label>
                                    <input class="form-control" type="text" name="carmodel_name"
                                           value="{{$carmodel->carmodel_name}}" placeholder="Model Name">
                                    @if($errors->has("carmodel_name"))
                                        <p class="error" style="color: red">{{$errors->first("carmodel_name")}}</p>
                                    @endif
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
