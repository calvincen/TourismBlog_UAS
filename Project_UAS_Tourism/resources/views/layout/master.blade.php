<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="jumbotron text-center mx-auto p-4 m-0">
        <h1 class="display 4">Wonderful Journey</h1>
        <p class="lead">Blog of Indonesian Tourism</p>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            @if(!$auth)
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/article/category/Beach">Beach</a>
                    <a class="dropdown-item" href="/article/category/Mountain">Mountain</a>
                    <a class="dropdown-item" href="/article/category/City">City</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aboutus">About Us</a>
                </li>
            @else
                @if(Auth::check() && (Auth::user()->role == "user"))
                <li class="nav-item active">
                    <a class="nav-link" href="/home/users">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog">Blog</a>
                </li>
               @else

                <li class="nav-item active">
                    <a class="nav-link" href="/home/admin">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/posts/">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/users/">User</a>
                </li>
               @endif

            @endif    
            </ul>
            
            @if ($auth)
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout"><span class="fas fa-sign-in-alt"></span> Logout </a>
                    </li>
                </ul>
            @else
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/register"><span class="fas fa-user"></span> Sign Up </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><span class="fas fa-sign-in-alt"></span> Login </a>
                    </li>
                </ul>
            @endif
        </div>
    </nav>
  <div class="container">
      @yield('content')
  </div>
  <footer class="bg-light mt-5">
      @include('layout.footer')
  </footer>
</body>
 
</html>