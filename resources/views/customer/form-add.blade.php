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
                                <li class="active"><a href="/view-customer">Customers</a></li>
                                <li class="active">Add Customer</li>
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
                                <h3 class="font-weight-bold">ADD CUSTOMER</h3>
                            </div>
                        </div>

                        <div class="p-4">
                            <form action="{{url("/add-customer")}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="customer_name"
                                           value="{{old("customer_name")}}"
                                           placeholder="Name">
                                    @if($errors->has("customer_name"))
                                        <p class="error" style="color: red">{{$errors->first("customer_name")}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="text" name="customer_email"
                                           value="{{old("customer_email")}}"
                                           placeholder="Email">
                                    @if($errors->has("customer_email"))
                                        <p class="error" style="color: red">{{$errors->first("customer_email")}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" name="customer_phone"
                                           value="{{old("customer_phone")}}"
                                           placeholder="Phone">
                                    @if($errors->has("customer_phone"))
                                        <p class="error" style="color: red">{{$errors->first("customer_phone")}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" type="text" name="customer_address"
                                           value="{{old("customer_address")}}"
                                           placeholder="Address">
                                    @if($errors->has("customer_address"))
                                        <p class="error" style="color: red">{{$errors->first("customer_address")}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>License Number (optional)</label>
                                    <input class="form-control" type="text" name="customer_license"
                                           value="{{old("customer_license")}}"
                                           placeholder="License Number">
                                    @if($errors->has("customer_license"))
                                        <p class="error" style="color: red">{{$errors->first("customer_license")}}</p>
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
