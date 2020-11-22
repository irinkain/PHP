@extends("layout.layout")
@section("content")
    <body class="antialiased container">
    <div class="container">
        <h1 class="text-primary">Here you can see users</h1>
        <div class="row row-cols-1 row-cols-md-2">
            @foreach($tags as $tag)
                <div class="col mb-4 ">
                    <div class="card text-white bg-primary mb-4 ">
                        <div class="p-5">
                            <div class="flex items-center">
                                <h2>{{$tag->name}}</h2>
                            </div>
                            <div class="margin_top">
                                <button type="button" class="btn btn-info">
                                    <a href="{{route('tags.edit', $tag->id)}}">Edit</a>
                                </button>
                            </div>
                            <div class="margin_top">
                                <form method="post" action="{{route('tags.delete', $tag->id)}}">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </body>
@endsection


