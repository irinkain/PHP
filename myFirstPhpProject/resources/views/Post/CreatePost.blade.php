@extends('layout.layout')

@section('content')
    <div class="row justify-content-center mt-4">
        <h1>
            CREATE POST
        </h1>
    </div>
    <div>
<form method="post" enctype="multipart/form-data" action="{{route('posts.save')}}">
    <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Post Title</label>
            <input type="name" class="form-control" placeholder="Name" name="title">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Post Text</label>
            <input type="name" class="form-control" placeholder="Name" name="text">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Post Views</label>
            <input type="name" class="form-control" placeholder="Name" name="views">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tags</label>
            <select name="tags[]" id=""multiple>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
    </div>
