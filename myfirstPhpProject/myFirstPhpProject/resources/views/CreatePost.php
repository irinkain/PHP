<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create post</title>
</head>
<body>
<form  method="post" enctype="multipart/form-data" action="{{route('posts.save')}}">
    <div class="box-body">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="name" class="form-control"  placeholder="Name" name="title"
            value = "<?php echo $title;?>">
        </div>
        <div class="form-group">
            <label for="text">Post Text</label>
            <input type="name" class="form-control"  placeholder="Name" name="post_text"
              value = "<?php echo $text;?>">
        </div>
        <div class="form-group">
            <label for="views">Post Likes</label>
            <input type="name" class="form-control"  placeholder="Name" name="likes"
              value = "<?php echo $views;?>">
        </div>
    </div>
    <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
</body>
</html>
