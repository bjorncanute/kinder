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
                                    <div class="card-module">
                                        <div class="card-module-block">
                                            <h5 class="card-module-title"><a href="#">Notes</a></h5>
                                            <a>See all</a>
                                        </div>

                                        <div class="card-module-block">
                                            <h5 class="card-module-title">Chat<span class="badge badge-secondary">BETA</span></h5>

                                            <a ata-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                            </a>


                                            <a ata-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                            </a>


                                            <a ata-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                            <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M20 0v13l-3 3h-7l-4 4H4v-4H0V3l3-3h17zM6 7a1 1 0 100 2 1 1 0 000-2zm4 0a1 1 0 100 2 1 1 0 000-2zm4 0a1 1 0 100 2 1 1 0 000-2z"></path></svg>
                                            </a>
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
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path transform="translate(3 3)" d="M12.569 0l-2.25 2.25H2.25v13.5h13.5V7.683L18 5.433V18H0V0h12.569zm2.749.46a1.572 1.572 0 012.222 2.222L10.222 10H8V7.778z"></path></svg>
            <svg>
        </span>

        <span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M22 2v20H2V2h20zm-2 2H4v16h16V4z M11 16h7v2H11z"></path></svg>
        </span>
        

        
        <span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><g transform="translate(3 3)"><path d="M8.87 11.63a2.71 2.71 0 110-5.43 2.71 2.71 0 010 5.43m8.04-4.58l-1.7-.34a6.67 6.67 0 00-.3-.71l.96-1.45c.3-.44.24-1.03-.14-1.4l-1.07-1.08a1.11 1.11 0 00-1.4-.14l-1.45.97a6.58 6.58 0 00-.72-.3L10.75.9c-.1-.53-.56-.9-1.09-.9H8.15c-.53 0-1 .37-1.1.9l-.34 1.7c-.24.09-.48.19-.71.3l-1.45-.97a1.11 1.11 0 00-1.4.14L2.06 3.14c-.37.38-.43.97-.14 1.4L2.9 6c-.11.23-.21.47-.3.71l-1.7.34c-.53.1-.9.57-.9 1.1v1.51c0 .53.37.99.9 1.1l1.7.33c.09.25.19.49.3.72l-.97 1.45c-.3.44-.23 1.03.14 1.4l1.07 1.07a1.11 1.11 0 001.4.14L6 14.91l.71.3.34 1.7c.1.52.57.9 1.1.9h1.51c.53 0 .99-.38 1.1-.9l.33-1.7.72-.3 1.45.96a1.1 1.1 0 001.4-.14l1.07-1.07c.38-.37.44-.96.14-1.4l-.96-1.45.3-.72 1.7-.34c.52-.1.9-.56.9-1.09V8.15c0-.53-.38-1-.9-1.1"></path></g></svg>
        </span>

            
            
        
            @yield('content')
        </main>
    </div>
</body>
</html>
