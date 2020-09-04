@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @can('update', $user->profile)
        <a href="/profile/{{ $user->id }}/edit" class="btn btn-secondary">Edit Profile</a>
    @endcan
    <div class="hero-section">
        <div class="hero-banner">
            <!-- hero banner should possibly be outside hero-secion -->
        </div>

        <div class="media">
            <!-- hello hook -->
            <img class="profile_avatar" width="100" height="100" src="{{ $user->profile->profileImage() }}" alt="">
            <div class="media-body">
                <h1>{{ $user->username }}</h1>
                <span class="watchers">{{ $user->profile->watchers->count() }} Watchers</span> | <span class="page-views">36.4k Page Views</span> | <span class="deviations">{{ $user->sketches->count() }} Deviations</span> <a href="#">chevron</a>
            </div>
        </div>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        
            <div class="container-fluid">
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
                        <watch-button user-id="{{ $user->id }}" watching="{{ $watching }}"></watch-button>
                    </li>
                </ul>
            </div>

        
        </nav>
        



    </div>

    
    <div class="container-fluid">
        
        <section class="collection-select">
            <nav class="gallery-nav d-flex">
                <h2 class="label">Collections</h2>
                <a href="#" class="btn btn-outline-dark">Edit</a>
                <a href="#" class="btn btn-outline-dark ml-auto">Search</a>
    
            </nav>

            <div class="collection-list d-flex">

                <a href="#" class="collection-item">
                    
                    <div class="thumbnail-image">
                        <img src="/storage/{{ $user->sketches->first()->thumbnail }}" alt="">
                    </div>
                    <div class="collection-name">All</div>
                    <div class="number-of-sketches">2846 deviations</div>
                </a>


                @foreach($user->collections as $collection)
                    <a href="/collections/{{$collection->id}}" class="collection-item">
                        
                        <div class="thumbnail-image">
                            <img src="/storage/{{ $collection->sketches->first()->thumbnail }}" alt="">
                        </div>
                        <div class="collection-name">{{ $collection->name }}</div>
                        <div class="number-of-sketches">2846 deviations</div>
                    </a>
                @endforeach
            </div>

        </section>
        
        <section class="selected-gallery">
            
            <div class="gallery_row d-flex no-gutters" id="gallery_src">
                
                @foreach($user->sketches as $sketch)
                <a href="/profile/{{ $sketch->user->id }}/art/{{ $sketch->id }}" class="sketch-item">
                    <img class="sketch-item-image" src="/storage/{{ $sketch->thumbnail }}" alt="">
                </a>
                @endforeach

                

            </div>

            <div class="gallery_row d-flex no-gutters" id="row_1" style="background-color: orange"></div>

            <div class="gallery_row d-flex no-gutters" id="row_2" style="background-color: green"></div>

            <div class="gallery_row d-flex no-gutters" id="row_3" style="background-color: red"></div>

            <div class="gallery_row d-flex no-gutters" id="row_4" style="background-color: blue"></div>


            

        </section>
    </div>

    

    <button id="move_row_btn" class="btn btn-primary" type="button" onclick="moveRow();">REORDER</button>

   
    
    <section class="about-section">
        <h2>About {{ $user->name }}</h2>
        <div class="tagline">
            {{ $user->profile->tagline }}
        </div>

        <div class="quick-stats">
            <div class="birthday">BD</div>
            <div class="location">local</div>
            <div class="join-date">Deviant for {{ $user->profile->joinedDate($user) }} days.</div>
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
