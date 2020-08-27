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
    <style type="text/css">
        .user-menu .dropdown-menu {
            width: 330px; 
        }

        .chat-menu .dropdown-menu {
            width: 440px;
        }

        .chat-menu .dropdown-menu .nav-link {
            color: black;
        }
        .chat-menu .dropdown-menu .nav-link.active {
            color: black;
        }

        .notification-menu .dropdown-menu {
            width: 440px;
        }

        .notification-menu .text-block {
            white-space: normal;
        }

        .notification-menu .msg-attention {
            background-color: #d4edda;
        }
        .notification-menu .avatar {
            position: relative;
        }
        .notification-type-icon {
            position: absolute;
            bottom: -10px;
            left: -14px;

            width: 28px;
            height: 28px;
            border-radius: 100px;
            background-color: white;
            box-shadow: 0 0 8px 0 rgba(0,0,0,.21);

            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
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
                            <li class="nav-item dropdown chat-menu">
                                <a id="notificationsDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"   aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span>
                                        <span class="_3g6BC _1Re00 _2yin0">
                                            <svg style="fill:white" width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M20 0v13l-3 3h-7l-4 4H4v-4H0V3l3-3h17zM6 7a1 1 0 100 2 1 1 0 000-2zm4 0a1 1 0 100 2 1 1 0 000-2zm4 0a1 1 0 100 2 1 1 0 000-2z"></path></svg>
                                        </span>
                                        <span class="hidden" style="display:none;">Chat</span>
                                    </span>
                                </a>

                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-item d-flex">
                                        <a class="mr-auto" href="#">Notes</a>
                                        <a>See all</a>
                                    </div>

                                    <div class="dropdown-divider"></div>

                                    <div class="dropdown-item d-flex">
                                        <a class="mr-auto">Chat<span class="badge badge-secondary">BETA</span></a>

                                        <a ata-toggle="tooltip" data-placement="top" title="New Note">
                                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path transform="translate(3 3)" d="M12.569 0l-2.25 2.25H2.25v13.5h13.5V7.683L18 5.433V18H0V0h12.569zm2.749.46a1.572 1.572 0 012.222 2.222L10.222 10H8V7.778z"></path></svg></span>
                                        </a>

                                        <a ata-toggle="tooltip" data-placement="top" title="Edit Notes">
                                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M22 2v20H2V2h20zm-2 2H4v16h16V4z M11 16h7v2H11z"></path></svg></span>
                                        </a>

                                        <a ata-toggle="tooltip" data-placement="top" title="Note Settings">
                                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><g transform="translate(3 3)"><path d="M8.87 11.63a2.71 2.71 0 110-5.43 2.71 2.71 0 010 5.43m8.04-4.58l-1.7-.34a6.67 6.67 0 00-.3-.71l.96-1.45c.3-.44.24-1.03-.14-1.4l-1.07-1.08a1.11 1.11 0 00-1.4-.14l-1.45.97a6.58 6.58 0 00-.72-.3L10.75.9c-.1-.53-.56-.9-1.09-.9H8.15c-.53 0-1 .37-1.1.9l-.34 1.7c-.24.09-.48.19-.71.3l-1.45-.97a1.11 1.11 0 00-1.4.14L2.06 3.14c-.37.38-.43.97-.14 1.4L2.9 6c-.11.23-.21.47-.3.71l-1.7.34c-.53.1-.9.57-.9 1.1v1.51c0 .53.37.99.9 1.1l1.7.33c.09.25.19.49.3.72l-.97 1.45c-.3.44-.23 1.03.14 1.4l1.07 1.07a1.11 1.11 0 001.4.14L6 14.91l.71.3.34 1.7c.1.52.57.9 1.1.9h1.51c.53 0 .99-.38 1.1-.9l.33-1.7.72-.3 1.45.96a1.1 1.1 0 001.4-.14l1.07-1.07c.38-.37.44-.96.14-1.4l-.96-1.45.3-.72 1.7-.34c.52-.1.9-.56.9-1.09V8.15c0-.53-.38-1-.9-1.1"></path></g></svg></span> 
                                        </a>

                                        
                                    </div>

                                    <div class="dropdown-divider"></div>

                                    <div class="dropdown-item">
                                        <div class="container d-flex justify-content-center">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a href="" class="nav-link active">General</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="" class="nav-link">Requests</a>
                                                </li>
                                            </ul>

                                            <div class="chat-module">
                                                <h5 class="pt-5">You don't have any chats yet!</h5>
                                                <figure>
                                                    <img src="https://st.deviantart.net/eclipse/chat/no-chats-light.svg" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="dropdown-divider"></div>


                                    <div class="dropdown-item d-flex justify-content-center">
                                        <a  href="#">See all Chats</a>
                                    </div>    


                                    
                                </div>

                        

                            </li>

                            <li class="nav-item dropdown notification-menu">
                                <a id="notificationDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"   aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span>
                                        <svg fill="#fff" width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M11.8286 15.999A2.995 2.995 0 0112 17.0008c0 1.6569-1.3431 3-3 3s-3-1.3431-3-3c0-.3513.0604-.6885.1714-1.0018h5.6572zM9 0c3.3323 0 7 2.5 7 7v4l1 2h1v2H0v-2h1l1-2V7c0-4.5 3.6677-7 7-7z"></path></g></svg>
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-item d-flex">
                                        <h5 class="mr-auto">Your Notifications</h5>
                                        <span>LIVE</span>
                                    </div>

                                    <div class="dropdown-divider"></div>

                                    <div class="dropdown-item p-0">
                                        <div class="notification-block d-flex align-items-start msg-attention py-3 px-4">
                                            <div class="media">
                                                <img width="32" height="32" src="https://st.deviantart.net/eclipse/team.jpg" alt="" class="mr-3">
                                                <div class="media-body" style="">
                                                    <h5 class="mt-0">New Posts From Deviants You Watch</h5>
                                                    <div class="text-block">Stay up to date with the latest posts from deviants you watch. See what’s happening on the new Posts feed on your homepage!</div>
                                                    <a href="">VIEW POSTS</a>

                                                </div>
                                            </div>
                                            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>

                                        <div class="notification-block d-flex align-items-start py-3 px-4">
                                            <div class="media">
                                                <div class="avatar">
                                                    <img width="32" height="32" src="https://a.deviantart.net/avatars-big/r/a/rainbowphilosopher.jpg?3" alt="" class="mr-3">
                                                    <div class="notification-type-icon">
                                                        <img src="https://st.deviantart.net/badges/llama_super.gif" alt="">
                                                    </div>
                                                </div>
                                                
                                                <div class="media-body">
                                                    <div class="text-block">
                                                        <span class="font-weight-bold">RainbowPhilosopher</span> gave you a new lhama badge
                                                        <div class="timestamp">Jan 05, 2020</div>
                                                    </div>
                                                </div>
                                                <button type="button" class="border btn btn-light">GIVE</button>

                                            </div>
                                        </div>

                                        <div class="notification-block d-flex align-items-start py-3 px-4">
                                            <div class="media">
                                                <div class="avatar">
                                                    <img width="32" height="32" src="https://a.deviantart.net/avatars-big/i/_/i-kirhi-o.jpg?7" alt="" class="mr-3">
                                                    <div class="notification-type-icon">
                                                        <svg width="18" height="18" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M22 2H5L2 5v13h4v4h2l4-4h7l3-3z"></path></svg>
                                                    </div>
                                                </div>
                                                
                                                <div class="media-body">
                                                    <div class="text-block">
                                                        <span class="font-weight-bold">i-Kirhi-O</span> replied on <span class="font-weight-bold">Megastructures Gas Giant Refinery</span>
                                                        <div class="timestamp">Oct 19, 2019</div>
                                                    </div>
                                                </div>
                                                <a href="#">
                                                    <img width="56" height="56" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/fc6624cd-db8b-41cc-9e29-e21d7e5a52bb/dbwdjnu-03b4dd37-d7d3-41c0-aa69-2a41839fb7d1.jpg/v1/fit/w_150,h_150,q_70,strp/megastructures_gas_giant_refinery_by_artofsoulburn_dbwdjnu-150.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3siaGVpZ2h0IjoiPD0xNTc5IiwicGF0aCI6IlwvZlwvZmM2NjI0Y2QtZGI4Yi00MWNjLTllMjktZTIxZDdlNWE1MmJiXC9kYndkam51LTAzYjRkZDM3LWQ3ZDMtNDFjMC1hYTY5LTJhNDE4MzlmYjdkMS5qcGciLCJ3aWR0aCI6Ijw9MTAyNCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.MrkQzh0-VIA_Pul3-W72BaDeAf9SIaKSvXd2j9cP0lY" alt="">
                                                </a>

                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="dropdown-divider"></div>
                                    
                                    <div class="dropdown-item d-flex justify-content-center">
                                        <a href="#">SEE ALL</a>
                                    </div>
                                </div>
                                
                            </li>

                            <li class="nav-item dropdown user-menu">
                                <a id="userDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"   aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span>
                                        <span class="_3g6BC _1Re00 _2yin0">
                                            <img src="https://st.deviantart.net/eclipse/icons/p07-dark.svg?1" width="30" height="30">
                                        </span>
                                        <span class="hidden" style="display:none;">Chat</span>
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    
                                    <h4>
                                        <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>    
                                    </h4>
                                    <a class="dropdown-item" href="#">Get Core</a>    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">My Groups</a>    
                                    <a class="dropdown-item" href="#">Sta.sh</a>    
                                    <div class="dropdown-item d-flex">
                                        <a class="mr-auto" href="#">Portfolio</a>    
                                        <a href="#">create</a>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Points <span>5</span></a>    
                                    <a class="dropdown-item" href="#">Earnings</a>    
                                    <a class="dropdown-item" href="#">Orders</a>    
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-item d-flex">
                                        <span class="mr-auto">Theme</span>
                                        <span class="theme-options ">
                                            <span class="dark-theme">X</span>
                                            <span class="light-theme">Y</span>
                                            <span class="green-theme">Z</span>
                                        </span>
                                    </div>
                                    <!-- <a class="dropdown-item" href="#">Theme</a>     -->
                                    <a class="dropdown-item" href="#">Account Settings</a>
                                    <div class="dropdown-item d-flex">
                                        <span class="mr-auto">Display Mature Content</span>
                                        <button>X</button>
                                    </div>
                                    <!-- <a class="dropdown-item" href="#">Display Mature Content</a> -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Get Help & Give Feedback</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>   
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
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><g transform="translate(3 3)"><path d="M8.87 11.63a2.71 2.71 0 110-5.43 2.71 2.71 0 010 5.43m8.04-4.58l-1.7-.34a6.67 6.67 0 00-.3-.71l.96-1.45c.3-.44.24-1.03-.14-1.4l-1.07-1.08a1.11 1.11 0 00-1.4-.14l-1.45.97a6.58 6.58 0 00-.72-.3L10.75.9c-.1-.53-.56-.9-1.09-.9H8.15c-.53 0-1 .37-1.1.9l-.34 1.7c-.24.09-.48.19-.71.3l-1.45-.97a1.11 1.11 0 00-1.4.14L2.06 3.14c-.37.38-.43.97-.14 1.4L2.9 6c-.11.23-.21.47-.3.71l-1.7.34c-.53.1-.9.57-.9 1.1v1.51c0 .53.37.99.9 1.1l1.7.33c.09.25.19.49.3.72l-.97 1.45c-.3.44-.23 1.03.14 1.4l1.07 1.07a1.11 1.11 0 001.4.14L6 14.91l.71.3.34 1.7c.1.52.57.9 1.1.9h1.51c.53 0 .99-.38 1.1-.9l.33-1.7.72-.3 1.45.96a1.1 1.1 0 001.4-.14l1.07-1.07c.38-.37.44-.96.14-1.4l-.96-1.45.3-.72 1.7-.34c.52-.1.9-.56.9-1.09V8.15c0-.53-.38-1-.9-1.1"></path></g></svg></span>

            
            
        
            @yield('content')
        </main>
    </div>
</body>
</html>
