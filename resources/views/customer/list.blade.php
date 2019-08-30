@extends("layout")
@section("main_content")
    <table class="table table-hover">
        <thead>
        <th>CustomerID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Driving License</th>
        <th>Active</th>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->customer_id}}</td>
                <td>{{$customer->customer_name}}</td>
                <td>{{$customer->customer_email}}</td>
                <td>{{$customer->customer_phone}}</td>
                <td>{{$customer->customer_address}}</td>
                <td>{{$customer->customer_license}}</td>
                <td>{{$customer->active}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $customers->links("navigation") !!}
@endsection
