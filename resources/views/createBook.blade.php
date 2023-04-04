<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/create-book">Create Book</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/create-category">Create Category</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/register">Register</a></li>
                  <li><a class="dropdown-item" href="/login">Login</a></li>
                </ul>
              </li>
          </div>
        </div>
      </nav>

    <div class="m-5">
        <h1>Create Book</h1>
        <form action="/store-book" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control @error('Name') is-invalid @enderror" id="exampleInputEmail1" name="Name" value="{{ old('Name') }}">
            </div>

            @error('Name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Publication Date</label>
                <input type="date" class="form-control @error('PublicationDate') is-invalid @enderror" id="exampleInputEmail1" name="PublicationDate" value="{{ old('PublicationDate') }}">
            </div>

            @error('PublicationDate')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Stock</label>
                <input type="number" class="form-control @error('Stock') is-invalid @enderror" id="exampleInputEmail1" name="Stock" value="{{ old('Stock') }}">
            </div>

            @error('Stock')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Author</label>
                <input type="text" class="form-control @error('Author') is-invalid @enderror" id="exampleInputEmail1" name="Author" value="{{ old('Author') }}">
            </div>

            @error('Author')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control @error('BookImg') is-invalid @enderror" id="exampleInputEmail1" name="BookImg">
            </div>

            @error('BookImg')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select class="form-select" aria-label="Default select example" name="CategoryName">
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->CategoryName }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
