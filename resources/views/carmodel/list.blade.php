@extends("layout")
@section("main_content")
    <a href="{{url("/add-carmodel")}}" class="btn btn-primary">Add Model</a>
    <table class="table table-hover">
        <thead>
        <th>ModelID</th>
        <th>Model Name</th>
        <th>Active</th>
        </thead>
        <tbody>
        @foreach($carmodels as $carmodel)
            <tr>
                <td>{{$carmodel->carmodel_id}}</td>
                <td>{{$carmodel->carmodel_name}}</td>
                <td>{{$carmodel->active}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $carmodels->links("navigation") !!}
@endsection
