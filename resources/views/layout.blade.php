<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel 8 CRUD Tutorial</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Acasa <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('games.index') }}">Games</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
</body>
</html>