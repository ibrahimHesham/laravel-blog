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
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">All posts <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>


<div class="container mt-5">

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
            <p class="card-text">{{$post['posted_by']}}</p>
            <h5 class="card-title">Email : </h5>
            <p class="card-text">{{$post['Email']}}</p>
            <h5 class="card-title">Created at : </h5>
            <p class="card-text">{{$post['created_at']}}</p>
        </div>
    </div>




</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>