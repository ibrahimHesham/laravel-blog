<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public $posts = [
        ['id' => 1, 'title' => 'post 1', 'posted_by' => 'Ibrahim', 'created_at' => '2021-03-20', 'description' => 'here is first post description', 'Email' => 'ibrahim@gmail.com'],
        ['id' => 2, 'title' => 'post 2', 'posted_by' => 'yehia', 'created_at' => '2021-04-15'],
        ['id' => 3, 'title' => 'post 3', 'posted_by' => 'Ali', 'created_at' => '2021-06-01'],
    ];
    public function index()
    {
        
        return view('posts.index', [
            'posts' => $this->posts
        ]);
    }

    public function show($postId)
    {
        $post = ['id' => 1, 'title' => 'post 1', 'posted_by' => 'Ibrahim', 'created_at' => '2021-03-20', 'description' => 'here is first post description', 'Email' => 'ibrahim@gmail.com'];
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
}
