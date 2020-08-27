@extends('layouts.app')

@section('content')
<div class="container">
    <div class="hero-section">
        <div class="hero-banner">
            <!-- hero banner should possibly be outside hero-secion -->
        </div>

        <div class="media">
            <div class="profile-avatar"></div>
            <div class="media-body">
                <h1>{{ $user->name }}</h1>
                <span class="watchers">1.9k Watchers</span> | <span class="page-views">36.4k Page Views</span> | <span class="deviations">81 Deviations</span> <a href="#">chevron</a>
            </div>
        </div>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        
            <div class="container">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto p-1">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Favourites</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">About</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto p-1">
                    <li class="nav-item">
                        <a href="#" class="nav-link">...</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">SHR</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Give</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">SEND NOTE</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">+ WATCH</a>
                    </li>
                </ul>
            </div>

        
        </nav>
        



    </div>
    <div class="container">
        <section class="latest-carousel d-flex">
            
            <div class="dummy"></div>
            <div class="dummy"></div>
            <div class="dummy"></div>
            <div class="dummy"></div>
            <div class="dummy"></div>

        </section>
    </div>

    <section class="about-section">
        <h2>About {{ $user->name }}</h2>
        <div class="tagline">
            {{ $user->profile->tagline }}
        </div>

        <div class="quick-stats">
            <div class="birthday">BD</div>
            <div class="location">local</div>
            <div class="join-date">Deviant for {{ $join_date }} days.</div>
        </div>

        <div class="badges">
            <h6>BADGES</h6>

        </div>

        <div class="bio">
            <h6>MY BIO</h6>
            {{ $user->profile->bio }}
        </div>
    </section>
</div>
@endsection
