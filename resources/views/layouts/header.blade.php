<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wink-Blog</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
          </a>
    
          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ url('/') }}" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
          </ul>
          <div class="col-md-3 text-end">
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                        <a href="{{ url('/logout') }}" type="button" class="btn btn-outline-primary me-2">Log Out</a>
                    @if (Auth::user()->isAdmin())
                        <a href="{{ url('/admin') }}" type="button" class="btn btn-primary">Admin</a>
                    @endif
                    @if (Auth::user()->isUser())
                        <a href="{{ url('/dashboard') }}" type="button" class="btn btn-primary">dashboard</a>
                    @endif
                @else
                <a href="{{ route('login') }}" type="button" class="btn btn-outline-primary me-2">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" type="button" class="btn btn-primary">Register</a>
                    @endif
                @endauth
            </div>
        @endif
          </div>
        </header>
      
