<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Wonderful Journey') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1 class="display-4 text-center">Wonderful Journey</h1>
                <p class="lead text-center">Blog of Indonesian Tourism</p>
            </div>
        </div>

    <div id="app">
        <div class="container-md">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ "Home" }}
                </a>

                <ul class="navbar-nav mr-auto">
                    {{-- home --}}
                    @guest
                        @if (Route::has('register'))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($categories as $c)
                                        <a class="dropdown-item" href="{{url('/'.$c->id.'/category')}}">{{$c->name}}</a>
                                     @endforeach
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">About Us</a>
                            </li>
                        @endif
                        @else
                        {{-- admin --}}
                            @if(Auth::user()->role == "admin")
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url("/admin")}}">Admin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url("/user")}}">User</a>
                                </li>
                            @endif
                            {{-- user --}}
                            @if(Auth::user()->role == "user")
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/'.Auth::user()->id.'/edit')}}">Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/'.Auth::user()->id.'/article')}}">Blog</a>
                                </li>
                            @endif
                    @endguest
                </ul>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                        @guest
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in"></i> {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user"></i> {{ __('Sign Up') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-in"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                            
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        </div>
    </div>
</body>
</html>
