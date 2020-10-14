<?php

namespace App\Controllers;


use App\Models\Post;
use http\Env\Request;

class PostController
{

    public function Index(){
        $posts = Post::all();
        return view ('getPublishedPosts')->with('posts',$posts);
    }


    public function show(Post $post){
        return view ('post')->with('post',$post);
    }
    public function create(){
        return view('create');
    }

    public function save(Request $request){
        $post = new Post($request.all());
        $post.save();
        return redirect()->back();
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view('edit')->with('post',$post);
    }

    public function update(Request $request,Post $post){
        $post.$this->update($request->all());
        return redirect()->back();
    }
    public function delete(Post $post){
        $post.$this->delete();
        return redirect()->route('posts.show', $post);
    }
}
