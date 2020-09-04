@extends('layouts.app')

@section('content')

<div class="container">

    <div class="media">
        
        <div class="media-body">
            <h1>{{ $collection->name }}</h1>

            <div class="list">
                @foreach($collection->sketches as $sketch)
                    <div class="sketch-item">
                        <h2>{{ $sketch->title }}</h2>
                        <a href="/profile/{{ $sketch->user->id }}/art/{{ $sketch->id }}" class="sketch-item">
                            <img class="sketch-item-image" src="/storage/{{ $sketch->thumbnail }}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
</div>

@endsection