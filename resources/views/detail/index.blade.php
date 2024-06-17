<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;700&display=swap" rel="stylesheet">

    {{-- Boxicons CSS --}}
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('style/view.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="background"></div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <span class="navbar-brand">Res | Coffee</span>
            <div class="collapse navbar-collapse" id="navbarNav">
                <select class="form-select" name="category_id" id="category_id">
                    <option>Menu</option>
                    @foreach ($categories as $category)
                        <option class="s11" value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/in" onclick="confirmLogin(event)">
                        <i class='bx bx-cog'></i>
                    </a>
                    <form id="login-form" method="POST" action="{{ route('start') }}" class="d-none">
                        @csrf
                    </form>   
                </li>
            </ul>                  
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @foreach ($categories as $category)
        <div class="slide" data-category="{{ $category->id }}" style="display: none">
            <h2 class="category-heading" data-category="{{ $category->id }}">{{ $category->name }}</h2>
            <div class="jumbotron" data-category="{{ $category->id }}" style="display: none">
                    <!-- Loop menu items based on the selected category -->
                @foreach (App\Models\Menu::where('category_id', $category->id)->get() as $menu)
                <div class="row-in">
                    <img src="{{ asset('storage/image-fd') }}/{{ $menu->image }}" width="200" height="160">
                    <p class="up">
                        <span class="data">{{ $menu->names }}</span>
                        <span class="data">Rp. {{ $menu->price }}</span>
                    </p>
                    <p class="down">
                        <span data-description="{{ $menu->description }}" class="view long-description">
                            <i class='bx bx-bulb icon'></i>
                        </span>
                    </p>                        
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    <script src="{{ asset('js/view.js') }}"></script>
</body>
</html>
