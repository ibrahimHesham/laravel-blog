@extends('layouts.app')
@section('title')Index Page @endsection
@section('content')
<a href="{{ route('posts.create') }}"  type="button" class="btn btn-success">Create</a>


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">posted_by</th>
      <th scope="col">created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach($pageposts as $post)
    <tr>
      <th scope="row">{{$post['id']}}</th>
      <td>{{$post['title']}}</td>
      <td>{{ $post->user ? $post->user->name : 'user not found' }}</td>
      <td>{{$post['created_at']}}</td>
      <td>
      <a href="{{ route('posts.show',['post' => $post['id']]) }}" type="button" class="btn btn-info">View</a>
      <a href="{{ route('posts.edit',['post' => $post['id']]) }}" class="btn btn-primary">Edit</a>
      <form action="{{ route('posts.destroy',['post' => $post['id']]) }}" method="POST" style="display:inline" onsubmit="return confirm('Do you really want to delete?');">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>    
      </form>
      </td>
    </tr>

    @endforeach

  </tbody>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">  
    @for ($i = 0; $i < count($posts)/5 ; $i++)
      <li class="page-item"><a class="page-link" href="{{ route('posts.paginate',['page' => $i+1]) }}">{{$i+1}}</a></li>
    @endfor
  </ul>
</nav>
@endsection
