<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="gatobuho.ico" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=IM+Fell+English' rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Oxygen:300,400,700' rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-zhaLg9HKxTxDljOPXpWHGn91XMDH+sYAWRSgvzHes290/ISyrNicGrd6BInTnx3L" crossorigin="anonymous">

    <!-- Styles -->
{{--     <link rel="stylesheet" href="{{ asset('css/skeleton-flexbox.css') }}"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="app">
        <nav class="">
            <section class="nav-right">
                <a class="logo" href="{{ route('home') }}"><img src="{{ asset('gatobuho-logo.png') }}" alt=" Logo{{ config('app.name', 'Laravel') }}"></a>
            </section>
            @yield('mobile-title')
            <section class="nav-left">
                @guest
                <a href="http://"></a>
                @else
                <a href="{{ route('profile') }}" class="profile">
                    <i class="fas fa-user-alt fa-1x"></i>
                    <p>{{ Auth::user()->name }}</p>
                </a>
                <a class="hidden" href=""><i class="fal fa-sign-out-alt fa-lg"></i></a>
                <a class="hidden dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </section>
        </nav>
        <main class="row">
            @yield('content')
        </main>
        <footer class="">
            <section class="foot-right">
                <a class="logo" href="{{ route('home') }}"><img src=" {{ asset('gatobuho-logo.png') }} " alt=""></a>
            </section>
            <section class="foot-left">
                <ul class="redes">
                    <li>
                        <a href=""><i class="fas fa-user-alt fa-1x"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fab fa-github-alt fa-1x"></i>
                        </a></li>
                    <li>
                        <a href=""><i class="fab fa-instagram fa-1x"></i></a>
                    </li>
                </ul>
            </section>
        </footer>
    </div>
</body>
</html>
