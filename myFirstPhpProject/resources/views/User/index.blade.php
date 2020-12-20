@extends("layout.layout")
@section("content")
    <body class="antialiased container">
    <div class="container">
        <h1 class="text-primary">Here you can see users</h1>
        <div class="row row-cols-1 row-cols-md-2">
            @foreach($users as $user)
                <div class="col mb-4 ">
                    <div class="card text-white bg-primary mb-4 ">
                        <div class="p-6">
                            <div class="flex items-center">
                                <h2>{{$user->name}}</h2>
                            </div>
                            <div>
                                <i class="fa fa-heart"></i>{{$user->email}}
                            </div>
                            <button type="button" class="btn btn-info">
                                <a href="{{route('posts.user_posts', $user->id)}}">
                                    Another post of this user
                                </a>
                            </button>
                            <button type="button" class="btn btn-info">
                                <a href="{{route('posts.user_posts', $user->id)}}">
                                    Another post of this user
                                </a>
                            </button>
                        </div>
                        <div>
                            @if($user->is_hired)
                                <a type="submit" class="fa fa-check-square-o btn-approve"
                                   url="{{route('is_hired', $user->id)}}"> hired</a>
                            @else
                                <a type="submit" class="fa fa-times btn-approve"
                                   url="{{route('is_hired', $user->id)}}">hired</a>
                            @endif
                        </div>
                        <div>
                            <h5>{{$user->email}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </body>
@endsection
