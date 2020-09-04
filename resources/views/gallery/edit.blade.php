@extends('layouts.app')

@section('content')
<div class="popup-blackout" style="background:black;position:absolute;top:90px;bottom:0;left:0;right:0;">
    <form action="/{{$user->username}}/gallery/{{ $selectedCollection->id }}" enctype="multipart/form-data" method="post">

    @csrf
    @method('PATCH')
        <div class="container collection-edit-model">

            <div class="header">
                <h1>Gallery</h1>
            </div>

            <div class="model-body d-flex">
            
                <div class="content-view">

                </div>

                <div class="collection-details">
                    <img src="{{$selectedCollection->coverImage ?? ''}}" alt="">
                    <div class="form_input">
                        <label for="name">Collection Title</label>
                        <input  id="name" 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name') ?? $selectedCollection->name }}" 
                                required 
                                autocomplete="name" 
                                autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>


            
            <div class="submit_button">
                <button class="btn btn-primary ml-auto">Save Profile</button>
            </div>
        </div>

        
    </form>  
</div>
@endsection
