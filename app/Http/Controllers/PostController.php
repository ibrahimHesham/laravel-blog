<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $allPosts=Post::all();
        //dd($allPosts);
        return view('posts.index', [
            'posts' => $allPosts
        ]);
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        ;
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'users' => User::all()
        ]);
    }

    public function edit($postId)
    {
        $post = Post::find($postId);
        return view('posts.edit', [
            'post' => $post,'users' => User::all()
        ]);
    }

    public function store(Request $request) // == calling request()
    {
        //dd(intval($request->user_id));
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = intval($request->user_id);
        $post->save();

        return redirect()->route('posts.index');
    }

    public function update(Request $request, $postId) // == calling request()
    {
        //dd($postId, intval($request->user_id), $request->description, $request->title);
        $updatedPost = Post::find(intval($postId));

        $updatedPost->title = $request->title;
        $updatedPost->description = $request->description;
        $updatedPost->user_id = $request->user_id;

        $updatedPost->save();
        return redirect()->route('posts.index');
    }

    public function destroy($postId)
    {
        //dd($postId);
        $post = Post::find($postId);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
