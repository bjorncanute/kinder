@extends('layouts.app')

@section('content')
<div class="container">
    @can('update', $user->profile)
        <a href="/profile/{{ $user->id }}/edit" class="btn btn-secondary">Edit Profile</a>
    @endcan
    <div class="hero-section">
        <div class="hero-banner">
            <!-- hero banner should possibly be outside hero-secion -->
        </div>

        <div class="media">
            <div class="profile-avatar"></div>
            <div class="media-body">
                <h1>{{ $user->name }}</h1>
                <span class="watchers">1.9k Watchers</span> | <span class="page-views">36.4k Page Views</span> | <span class="deviations">{{ $user->sketches->count() }} Deviations</span> <a href="#">chevron</a>
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
        
        <section class="latest-carousel">
            
            <div class="gallery_row d-flex no-gutters" id="gallery_src">
                
                @foreach($user->sketches as $sketch)
                <a href="/profile/{{ $sketch->user->id }}/art/{{ $sketch->id }}" class="image_thumbnail" style="margin: 1px">
                    <img src="/storage/{{ $sketch->thumbnail }}" alt="" style="width: 100%; height: auto;">
                </a>
                @endforeach

                

            </div>

            <div class="gallery_row d-flex no-gutters" id="row_1" style="background-color: orange"></div>

            <div class="gallery_row d-flex no-gutters" id="row_2" style="background-color: green"></div>

            <div class="gallery_row d-flex no-gutters" id="row_3" style="background-color: red"></div>

            <div class="gallery_row d-flex no-gutters" id="row_4" style="background-color: blue"></div>


            

        </section>
    </div>

    <script type="text/javascript">
        
        function moveRow() {                    
            var image_thumbnails = gallery_src.getElementsByClassName('image_thumbnail');
            // convert to ordinarry array: not a live updating array that will fuck you up!
            image_thumbnails = [].slice.call(image_thumbnails, 0);

            var viewport_width = 1000;
            var row_width = 0;
            var row_num = 0;
            var rows = [
                row_1, row_2, row_3, row_4,
            ];
            

            for (const image of image_thumbnails) {
                row_width += image.firstChild.naturalWidth;

                console.log(image.firstChild.naturalWidth);
                // row_2.appendChild(image);
                rows[row_num].append(image);
                if (row_width > viewport_width) {

                    row_width = 0;
                    row_num++;
                }
            }
            
        }



    </script>

    <button class="btn btn-primary" type="button" onclick="moveRow();">REORDER</button>
    
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
