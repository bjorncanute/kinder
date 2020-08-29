@extends('layouts.app')

@section('content')

<div class="container">
    <img src="/storage/{{ $sketch->image }}" alt="">

    <div class="media">
        
        <div class="media-body">
            <h1>{{ $sketch->title }}</h1>
            <div class="">By 
                <a href="/profile/{{ $user->id }}">{{ $user->name }}</a>
            </div>
        </div>
    </div>
    
    <div class="description">
        {{ $sketch->description }}
    </div>
</div>

@endsection