@extends('layouts.app')

@section('title')Post Page @endsection

@section('content')

    <div class="card">
        <div class="card-header">
            Post info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title : </h5>
            <p class="card-text">{{$post['title']}}</p>
            <h5 class="card-title">Description : </h5>
            <p class="card-text">{{$post['description']}}</p>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header">
            Post creator info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: </h5>
            <p class="card-text">{{ $post->user ? $post->user->name : 'user not found' }}</p>
            <h5 class="card-title">Email : </h5>
            <p class="card-text">{{ $post->user ? $post->user->email : 'user not found' }}</p>
            <h5 class="card-title">Created at : </h5>
            <p class="card-text">{{$post['created_at']}}</p>
        </div>
    </div>
    @endsection