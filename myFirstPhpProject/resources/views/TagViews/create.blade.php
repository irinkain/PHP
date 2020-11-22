create -
@extends("layout.layout")
@section("content")
    <body>
    <h1>hi create new post</h1>
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="{{route('tags.save')}}">
            <div class="box-body">

                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           placeholder="Name" name="name" value="{{old('name')}}"/>
                    @error('name')
                    <p class="text-danger">{{$errors->first('name')}}</p>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    </body>
@endsection
