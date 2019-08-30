@extends("layout")

@section("main_content")
    <form action="{{url("/add-car")}}" method="post">
        @csrf
        <div class="form-group">
            <label>Model</label>
            <select name="carmodel_id" class="form-control">
                @foreach($carmodels as $carmodel)
                    <option value="{{$carmodel->carmodel_id}}" @if($carmodel->carmodel_id == old("carmodel_id")) selected @endif>
                        {{$carmodel -> carmodel_name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Plate Number</label>
            <input class="form-control" type="text" name="car_plate" value="{{old("car_plate")}}"
                   placeholder="Plate Number">
            @if($errors->has("car_plate"))
                <p class="error" style="color: red">{{$errors->first("car_plate")}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Color</label>
            <input class="form-control" type="text" name="car_color" value="{{old("car_color")}}"
                   placeholder="Color">
        </div>
        <div class="form-group">
            <label>Manufacture Year</label>
            <input class="form-control" type="text" name="manufacture_year" value="{{old("manufacture_year")}}"
                   placeholder="Manufacture Year">
        </div>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-danger">Add car</button>
        </div>
    </form>
@endsection
