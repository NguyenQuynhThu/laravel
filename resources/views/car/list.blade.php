@extends("layout")
@section("main_content")
    <a href="{{url("/add-car")}}" class="btn btn-primary">Add car</a>
    {{--@if(Session::has("success"))
        <p style="color: green">{{Session::get("success")}}</p>
    @endif
    @if($errors->has("fail"))
        <p style="color: red">{{$errors->first("fail")}}</p>
    @endif--}}
    <table class="table table-hover">
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
                <td>{{$car->carmodel_id}}</td>
                <td>{{$car->car_plate}}</td>
                <td>{{$car->car_color}}</td>
                <td>{{$car->manufacture_year}}</td>
                <td>{{\App\Car::$_StatusLabel[$car->active]}}</td>
                <td><a href="{{url("edit-car?id=".$car->car_id)}}">Edit</a></td>
                <td>
                    <a onclick="return confirm('Are you sure?')" href="{{url("delete-car/".$car->car_id)}}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $cars->links("navigation") !!}
@endsection
