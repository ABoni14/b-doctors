<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BDoctors @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand ab-navbar">
            <div class="container">
                <div class="d-flex align-items-center">
                    @auth
                    <a 
                    href="{{ route('logout') }}"
                    onclick="confirm('Stai per effettuare il logout, confermi?')
                    event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <img src="{{asset('images/logo2.png')}}" alt="logo" width="70px" class="mr-3">
                    </a> 
                    
                    <a class="navbar-brand text-white ab-text-logo d-none d-sm-block" 
                    href="{{ route('logout') }}"
                    onclick="
                    confirm('Stai per effettuare il logout, confermi?')
                    event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    BDoctors
                    </a> 
                    @endauth
                    
                    @guest
                    <a 
                    href="{{ route('home') }}">
                        <img src="{{asset('images/logo2.png')}}" alt="logo" width="70px" class="mr-3">
                    </a> 
                    
                    <a class="navbar-brand text-white ab-text-logo d-none d-sm-block" 
                    href="{{ route('home') }}">
                    BDoctors
                    </a>
                    @endguest
                    
                </div>
                

                <div class="navbar" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white ab-text-header" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white ab-text-header" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white ab-text-header" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
