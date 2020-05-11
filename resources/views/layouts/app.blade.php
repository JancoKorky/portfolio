<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    {{-- Script --}}
    <script src="{{ asset('js/jQuery.js') }}"></script>

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/a40c1fb350.js" crossorigin="anonymous"></script>
</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        @guest <a class="navbar-brand text-danger" href="/">Portfólia.sk</a>
        @else <a class="navbar-brand text-danger" href="#">Portfólia.sk</a>
        @endguest
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @if (Request::is('user/*'))
                    <li class="nav-item {{ (Route::currentRouteName() == 'user.show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('user/'. Request::segment(2))}}">Portfólio</a>
                    </li>

                    <li class="nav-item {{ (Route::currentRouteName() == 'user.album.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('user/'. Request::segment(2). '/album')}}">Galéria</a>
                    </li>



                    <li class="nav-item {{ (Route::currentRouteName() == 'user.contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('user/'. Request::segment(2). '/contact')}}">Kontakt</a>
                    </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.show',Auth::id()) }}">
                                Moje portfólio
                            </a>
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

    <main class="">
        @yield('content')
    </main>
</div>
</body>


<script src="{{ asset('js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>--}}
<script src="{{ asset('js/myjs.js') }}"></script>
</html>
