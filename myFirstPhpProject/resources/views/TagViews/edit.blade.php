@extends("layout.layout")
@section("content")
    <body>
    <h1>hi edit new post</h1>
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="{{route('tags.update', $tag->id)}}">
            @csrf
            @method("PUT")
            <div class="box-body">
                <div class="form-group">
                    <label for="name">tag name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name', $tag->name)}}">
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
