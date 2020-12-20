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

    public function create()
    {
        $tags = Tag::all();
        return view('post/create_post', compact('tags'));
    }

    public function save(SavePostRequest $request)
    {
        $post = new Post($request->all());
        $post->user_id = Auth::id();
        $post->save();
        $post->tags()->attach($request->tags);
        return redirect()->action([PostController::class, 'index']);
    }

    public function show(Post $post)
    {
        return view("post/post")->with("post", $post);
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view("post/edit", compact('post', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        $post->user_id = Auth::id();
        $post->tags()->detach($post->tags->pluck('id'));
        $post->tags()->attach($request->tags);
        return redirect()->route('posts.show', $post->id);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->action([PostController::class, 'index']);
    }

    public function my_posts()
    {
        $id = Auth::id();
        $user = User::find($id);
        $posts = $user->posts;
        return view('post/index', ['posts' => $posts]);
    }

    public function user_post(User $user)
    {
        $posts = $user->posts;
        return view('post/index', ['posts' => $posts]);
    }
    public function approve(Post $post){
        $this->authorize('approve',$post);
        $post->increment('views',1);
        return redirect()->back();s
    }
}
