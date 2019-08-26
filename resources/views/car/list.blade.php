@extends("layout")
@section("main_content")
    <table class="table table-hover">
        <thead>
        <th>ID</th>
        <th>Model</th>
        <th>Plate</th>
        <th>Color</th>
        <th>Manufacture Year</th>
        <th>Active</th>
        </thead>
        <tbody>
        @foreach($cars as $car)
            <tr>
                <td>{{$car->car_id}}</td>
                <td>{{$car->carmodel_name}}</td>
                <td>{{$car->car_plate}}</td>
                <td>{{$car->car_color}}</td>
                <td>{{$car->manufacture_year}}</td>
                <td>{{$car->active}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $cars->links("navigation") !!}
@endsection
