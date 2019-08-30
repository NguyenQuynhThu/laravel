@extends("layout")

@section("main_content")
    <form action="{{url("/add-carmodel")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Model Name</label>
            <input class="form-control" type="text" name="carmodel_name" value="{{old("carmodel_name")}}"
                   placeholder="Model Name">
            @if($errors->has("carmodel_name"))
                <p class="error" style="color: red">{{$errors->first("carmodel_name")}}</p>
            @endif
        </div>

        <div class="form-group text-right">
            <button type="submit" class="btn btn-danger">Add Model</button>
        </div>
    </form>
@endsection
