<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/add.css')}}">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('createform')}}">Add Book</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('create.author.form')}}">Add Author</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('create.cat.form')}}">Create Category</a>
              </li>
            </ul>

            <ul>
                <a href="#" class="btn btn-warning">Logout</a>
            </ul>
        </div>
    </nav>
    <form method="POST" action="{{route('create.author')}}" class="content">
        @csrf
        <p>Create Author</p>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Nama Author</span>
            <input type="text" class="form-control" aria-label="Sizing example input" name="author_name" aria-describedby="inputGroup-sizing-default">
        </div>
        <button type="submit">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>