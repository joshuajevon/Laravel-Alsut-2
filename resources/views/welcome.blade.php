<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <h1>welcome</h1>
    {{-- table --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Publication Date</th>
                <th scope="col">Stock</th>
                <th scope="col">Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->Name }}</td>
                    <td>{{ $b->PublicationDate }}</td>
                    <td>{{ $b->Stock }}</td>
                    <td>{{ $b->Author }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- card --}}
    <div class="m-5">
        @foreach ($books as $b)
            <div class="card m-4" style="width: 18rem;">
                <img src="{{ asset('storage/'. $b->BookImg) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-title">{{ $b->Name }}</h1>
                    <h3>{{ $b->PublicationDate }}</h3>
                    <p class="card-text">{{ $b->Stock }}</p>
                    <p>{{ $b->Author }}</p>
                    <p>{{ $b->category->CategoryName }}</p>
                    <a href="/update-book/{{ $b->id }}" class="btn btn-primary">Edit Book</a>
                    <form action="/delete-book/{{ $b->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
