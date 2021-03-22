@extends('layouts.app')

@section('title')Edit Page @endsection

@section('content')


@if ($errors->any())
  <div class="alert alert-danger" style="margin-top: 20px">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('posts.update', ['post' => $post['id']]) }}">
  <div class="form-group">
  @csrf
  @method('PUT')
    <input type="hidden" id="id" name="id" value="{{$post['id']}}">
    <label for="Title">Title</label>
    <input name="title" type="text" class="form-control" id="Title" value="{{$post['title']}}">
  </div>
  <div class="form-group">
    <label for="PostCreator">Post Creator</label>
    <select name="user_id" class="form-control" id="PostCreator">
      @foreach ($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="Description">Description</label>
    <textarea name="description" class="form-control" id="Description" rows="3">{{$post['description']}}</textarea>
  </div>
  <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection