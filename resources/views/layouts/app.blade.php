<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            
            <div class="container-fluid">

                <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('', 'DeviantArt') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
                </button>    

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a href="#" class="nav-link">Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">Watch</a>
                        </li>
                       
                        <li class="nav-item">
                            <div class="dropdown show">
                                <a href="#" class="btn btn-secondary dropdown-toggle" role="button"id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                More
                                </a>

                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Prints Shop</a>
                                    <a href="#" class="dropdown-item">Groups</a>
                                    <a href="#" class="dropdown-item">Forum</a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">Search</a>
                        </li>                   

                        
                        
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto p-1">
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
                                <a id="notificationsDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"   aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span>
                                        <span class="_3g6BC _1Re00 _2yin0">
                                            <svg style="fill:white" width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M20 0v13l-3 3h-7l-4 4H4v-4H0V3l3-3h17zM6 7a1 1 0 100 2 1 1 0 000-2zm4 0a1 1 0 100 2 1 1 0 000-2zm4 0a1 1 0 100 2 1 1 0 000-2z"></path></svg>
                                        </span>
                                        <span class="hidden" style="display:none;">Chat</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-card">
                                        <div class="card-module">
                                            <h5 class="card-module-title"><a href="#">Notes</a></h5>
                                            <a>See all</a>
                                        </div>

                                        <div class="card-module">
                                            <h5 class="card-module-title">Chat<span class="badge badge-secondary">BETA</span></h5>
                                        </div>

                                        <a class="dropdown-item" href="#">See all Chats</a>    
                                    </div>
                                </div>

                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
