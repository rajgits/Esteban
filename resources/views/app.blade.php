<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title', $title)</title>
</head>

<body>
    <div class="container-fluid ">
        @auth
        <nav class="navbar navbar-expand-lg navbar-light app_bg">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <a href="/" class="text-white nav-app">Shopping App</a>
              
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto text-end">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M10.555 11.78a6.5 6.5 0 1 0-.753-.96l3.68-3.68a.75.75 0 0 0-1.06-1.06l-3.68 3.68a6.477 6.477 0 0 0-1.847-1.302l.617-2.477a.75.75 0 1 0-1.458-.324l-.617 2.477a6.5 6.5 0 0 0-1.302 1.847l3.68 3.68a.75.75 0 0 0 1.06 1.06l-3.68-3.68a6.477 6.477 0 0 0 1.302 1.847l2.477-.617a.75.75 0 1 0-.324-1.458l-2.477.617z"/>
                          </svg>
                        </button>
                      </form>
                    
                  <li class="nav-item dropdown">
                    <a href="#" class="d-block link-dark text-decoration-none" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item"  href="{{ route('password') }}">Change Password</a></li>
                      <li><a class="dropdown-item"  href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        @endauth
        @guest
        <div class="col-12 app_bg p-4 mb-5">
            <div class="text-center">
                <h1>@yield('title', $title)</h1>
            </div>
        </div>
        @endguest
        @yield('content')

    </div>
</body>

</html>