<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GudangKu') }} | @yield('title')</title>
    <link rel="icon" href="{{ asset('Favicon.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
    body {
        background: #f5f6fa;
    }

    .navbar {
        background: #0d6efd !important;
    }

    .navbar-brand, .nav-link {
        color: #fff !important;
        font-weight: 600;
    }

    .nav-link:hover {
        opacity: .8;
    }

    .card {
        border-radius: 12px !important;
    }

    .table thead th {
        background: #f0f2f5 !important;
        font-weight: 600;
    }

    .btn-primary {
        border-radius: 10px;
    }

    .btn-warning, .btn-danger {
        border-radius: 8px;
    }

    .stat-card {
        background: linear-gradient(135deg, #0d6efd20, #0d6efd10);
        border-left: 4px solid #0d6efd;
        border-radius: 12px;
    }

    .stat-card h2 {
        font-size: 40px;
        margin: 0;
        font-weight: 800;
        color: #0d6efd;
    }
</style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                    <img src="{{ asset('Favicon.png') }}" alt="Logo" style="height: 28px; width:auto;">
                    {{ config('app.name', 'GudangKu') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Sisi Kiri Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Sisi Kanan Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Links Navbar -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    👤{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
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
</body>
</html>
