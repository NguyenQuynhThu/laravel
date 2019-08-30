@extends("layout")
@section("main_content")
    <table class="table table-hover">
        <thead>
        <th>DriverID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Driving License</th>
        <th>Active</th>
        </thead>
        <tbody>
        @foreach($drivers as $driver)
            <tr>
                <td>{{$driver->driver_id}}</td>
                <td>{{$driver->driver_name}}</td>
                <td>{{$driver->driver_phone}}</td>
                <td>{{$driver->driver_license}}</td>
                <td>{{$driver->active}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $drivers->links("navigation") !!}
@endsection
