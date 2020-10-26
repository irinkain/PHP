@extends("home")

@section("content")
    <form  method="post" enctype="multipart/form-data" action="{{route('employees.update', $employee->id)}}">
        @csrf
        @method("PUT")
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">name</label>
                <input type="name" class='form-control {{$errors->first("Name")? "is-invalid" : "" }}'  value="{{old('name', $employee->name)}}" placeholder="Name" name="name">
                @if($errors->has("Name"))
                    <p class="text-danger"> {{$errors->first("Name")}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">surname</label>
                <input type="name" class='form-control {{$errors->first("Surname")? "is-invalid" : "" }}'  placeholder="{{old('surname', $employee->surname)}}" name="surname">
                @if($errors->has("Surname"))
                    <p class="text-danger"> {{$errors->first("Surname")}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">position</label>
                <input type="name" class='form-control {{$errors->first("Position")? "is-invalid" : "" }}' value="{{old('position', $employee->position)}}" placeholder="Name" name="position">
                @if($errors->has("Position"))
                    <p class="text-danger"> {{$errors->first("Position")}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">phone</label>
                <input type="name" class='form-control {{$errors->first("Phone")? "is-invalid" : "" }}' value="{{old('phone', $employee->phone)}}" placeholder="Name" name="phone">
                @if($errors->has("Phone"))
                    <p class="text-danger"> {{$errors->first("Phone")}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">is_hired</label>
                <input type="name" class="form-control" value="{{old('Is_hired', $employee->is_hired)}}"
                       placeholder="Name" name="Is_hired">
            </div>
        </div>
        <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
