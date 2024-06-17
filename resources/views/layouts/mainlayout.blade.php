<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Font google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;700&display=swap" rel="stylesheet">

    {{-- Boxicons CSS --}}
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    
    {{-- Style CSS --}}
    <link rel="stylesheet" href="{{ asset('style/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="sidebar close" id="sidebar">
            <div class="header">
                <div class="item">
                    <img src="{{asset('img/Logo.png') }}" alt="" class="icon" width="40" height="50">
                    <span class="description-header">Res|Coffee</span>
                </div>
                <div class="illustration">
                    <img src="{{ asset('img/Ilustration.png') }}" alt="" width="150" height="100">
                </div>
            </div>
            <div class="main">
                <div class="list-item" id="other-menu">
                    <a href="/home">
                        <i class='bx bx-home icon'></i>
                        <span class="description">Home</span>
                    </a>
                </div>
                <div class="list-item" id="other-menu">
                    <a href="/category">
                        <i class='bx bx-category icon'></i>
                        <span class="description">Category</span>
                    </a>
                </div>
                <div class="list-item" id="other-menu">
                    <a href="/menu">
                        <i class='bx bx-food-menu icon'></i>
                        <span class="description">Menu</span>
                    </a>
                </div>
                <div class="list-item" id="other-menu">
                    <a href="/">
                        <i class='bx bx-coffee icon'></i>
                        <span class="description">Details</span>
                    </a>
                </div>              
            </div>
            <div class="logout">
                <li class="nav-item custom-dropdown">
                    <a id="navbarDropdown" class="nav-link custom-dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class='bx bx-log-out-circle icon'></i>
                        <span class="description">{{ Auth::user()->name }}</span>
                    </a>
                
                    <div class="custom-dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/in" onclick="confirmLogin(event)">
                            Logout
                        </a>
                
                        <form id="login-form" action="{{ route('start') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>  
            </div>
        </div>
        <div class="main-content">
            <nav class="custom-nav">
                <ul class="nav-menu">
                    <li class="nav-item"><a class="nav-link">@yield('page_title')</a></li>
                </ul>
                <div id="cek">
                    <i class='bx bx-chevron-right toggle'></i>
                </div>
            </nav>            
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>    
    <script src="{{ asset('js/myjs.js') }}"></script>
</body>
</html>