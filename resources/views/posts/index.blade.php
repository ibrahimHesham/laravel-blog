<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('posts.index') }}">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('posts.index') }}">All posts <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>


<div class="container mt-5">

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

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>