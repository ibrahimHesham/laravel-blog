@extends('layouts.app')
@section('title')create Page @endsection
@section('content')
<form  method="POST" action="{{route('posts.store')}}">
  @csrf
  <div class="form-group">
    <label for="Title">Title</label>
    <input name="title" type="text" class="form-control" id="Title">
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
    <textarea name="description" class="form-control" id="Description" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Create</button>
</form>
@endsection