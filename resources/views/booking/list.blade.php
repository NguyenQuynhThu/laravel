@extends("layout")
@section("main_content")
    <table class="table table-hover">
        <thead>
        <th>BookingID</th>
        <th>Customer</th>
        <th>Car</th>
        <th>Driver</th>
        <th>Pickup Date</th>
        <th>Drop Date</th>
        <th>Total</th>
        <th>Active</th>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{$booking->booking_id}}</td>
                <td>{{$booking->customer_id}}</td>
                <td>{{$booking->car_id}}</td>
                <td>{{$booking->driver_id}}</td>
                <td>{{$booking->pickup_date}}</td>
                <td>{{$booking->drop_date}}</td>
                <td>{{$booking->total}}</td>
                <td>{{$booking->active}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $bookings->links("navigation") !!}
@endsection
