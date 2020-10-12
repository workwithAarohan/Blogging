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
    body
    {
        background-color: #E9E8E8;
    }
    .sidebar-toggle-button{
        margin-right:10px;
        display:none;
    }
    .sidebar{
        min-height:94.1vh;
        max-height:95vh;
        width:200px;
        left:0;
        padding:0;
        background-color:#292b2c;
        z-index:1;
        position:absolute;
        opacity:1;
        transition: all 0.3s ease-in-out;
    }
    .blog{
       width:calc(100vw - 220px);
       min-height:94.1vh;
       max-height:95vh;
       overflow:scroll;
       position:absolute;
       right:0;
       -ms-overflow-style: none;
    }
    .sidebar ul li img{
        display:block;
        transition: all 0.5s ease-in-out;
    }
    .sidebar ul{
        visibility:visible;
        transition: all 0.5s ease-in-out;
    }
    .sidebar ul li a{
        display:block;
        transition: all 0.5s ease-in-out;
        white-space:nowrap;
    }
    a:hover{
        text-decoration:none;
    }
    .sidebar li:hover{
        background-color:#999DA0;
    }
    .sidebar ul li a{
        color:#FFFFFF;
    }
    .blog::-webkit-scrollbar { 
        display: none;
    }
    .fa-star{
    color:#D3D3D3;
}
    .fill{
        color:#F07D55 ;
    }
    @media only screen and (max-width:992px){
    .sidebar-toggle-button{
        margin-right:10px;
        display:block;
    }
    .sidebar{
        width:0px;
        opacity:0;
    }
    .blog{
       width:99vw;
    }
    .sidebar ul li img{
        display:none;
    }
    .sidebar ul{
        visibility:hidden;
    }
    .sidebar ul li a{
        display:none;
    }
    }
    </style>
</head>
<body>
    <div class="menu container-fluid p-0">
                <div id="app">
                    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="sidebar-toggle-button btn" onclick="toggleNav()"><span class="navbar-toggler-icon"></span></div>
                    <a class="navbar-brand" href="/">Blog Admin</a>
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

        <main class="container-fluid d-flex flex-grow-1 p-0">
            <div class="sidebar">
                    @yield('sidebar')
                </div>
                <div class="py-2 blog">
                    @yield('content')
                </div>
        </main>
    </div>

    <script>
    
    let toggleNavStatus = false;

    let toggleNav =function(){
    let getSidebar = document.querySelector(".sidebar");
    let getSidebarUl = document.querySelector(".sidebar ul");
    let getSidebarLink = document.querySelectorAll(".sidebar ul li a");
    let getImage = document.querySelector(".sidebar ul li img");

    if(toggleNavStatus === false){
        getSidebarUl.style.visibility= "visible";
        getSidebar.style.width= "200px";
        getSidebar.style.opacity = "1";
        getImage.style.display = "block";

        let arrayLength = getSidebarLink.length;
        for(let i= 0; i<arrayLength; i++){
            getSidebarLink[i].style.display = "block";
        }
        toggleNavStatus = true;
    }else if(toggleNavStatus === true){
        getSidebar.style.width= "0px";
        getSidebar.style.opacity = "0";
        getImage.style.display = "none";

        let arrayLength = getSidebarLink.length;
        for(let i= 0; i<arrayLength; i++){
            getSidebarLink[i].style.display = "none";
        }
        getSidebarUl.style.visibility= "hidden";
        toggleNavStatus = false;
    }
}
    window.addEventListener("resize", onresize);
    function onresize(){
        var x = window.innerWidth;
        if(x >= 992){
        document.querySelector(".sidebar ul").style.visibility= "visible";
        document.querySelector(".sidebar").style.width= "200px";
        document.querySelector(".sidebar").style.opacity = "1";
        document.querySelector(".sidebar ul li img").style.display = "block";
        let getSidebarLink = document.querySelectorAll(".sidebar ul li a");

        let arrayLength = getSidebarLink.length;
        for(let i= 0; i<arrayLength; i++){
            getSidebarLink[i].style.display = "block";
        }
        }else{
        document.querySelector(".sidebar ul").style.visibility= "hidden";
        document.querySelector(".sidebar").style.width= "0px";
        document.querySelector(".sidebar").style.opacity = "0";
        document.querySelector(".sidebar ul li img").style.display = "none";
        let getSidebarLink = document.querySelectorAll(".sidebar ul li a");

        let arrayLength = getSidebarLink.length;
        for(let i= 0; i<arrayLength; i++){
            getSidebarLink[i].style.display = "none";
        }
        }
    }

    </script>
</body>
</html>
