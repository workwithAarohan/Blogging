<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
<<<<<<< HEAD
=======
    body
    {
        background-color: #E9E8E8;
    }

>>>>>>> 7c94d9f0a202a8e7353c8909c2169a9c8469432a
    a:hover{
        text-decoration:none;
    }
    .sidebar li:hover{
        background-color:#999DA0;
    }
    .sidebar li a{
        color:#FFFFFF;
    }
    </style>
</head>
<body>
    <div class="menu container-fluid">
        <div class="row">
<<<<<<< HEAD
            <div class="col-3 col-md-2 border p-0">
=======
            <div class="border p-0" style="width: 200px;">
>>>>>>> 7c94d9f0a202a8e7353c8909c2169a9c8469432a
                <nav class="navbar navbar-light bg-white justify-content-center">
                <a class="h3 text-dark" href="/">Blog Admin</a>
                </nav>
            </div>

            <div class="col-9 col-md-10 p-0">
                <div id="app">
                    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

        <main class="container-fluid">
            <div class="row">
<<<<<<< HEAD
                <div class="col-3 col-md-2 bg-dark position-sticky p-0 sidebar" style="height:95vh">
=======
                <div class="bg-dark position-sticky p-0 sidebar" style="height:95vh; width: 200px;">
>>>>>>> 7c94d9f0a202a8e7353c8909c2169a9c8469432a
                    @yield('sidebar')
                </div>

                <div class="col-9 col-md-10 py-2">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
