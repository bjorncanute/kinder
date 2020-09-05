@extends('layouts.app')

@section('content')
<div class="popup-blackout" style="background:black;position:absolute;top:90px;bottom:0;left:0;right:0;">
    <form action="/{{$user->username}}/gallery/{{ $selectedCollection->id }}" enctype="multipart/form-data" method="post">

    @csrf
    @method('PATCH')
        <div class="container collection-edit-model mt-5">

            <div class="header" style="height:110px;">
                <h1 style="line-height:110px;">Gallery</h1>
            </div>

            <div class="model-body row">
            
                <div class="content-view col-8" style="background:#eee;">
                    <nav aria-label="breadcrumb" class="d-flex mt-4">
                        <ol class="breadcrumb col-8 mr-auto">
                            <li class="breadcrumb-item">Collections</li>
                            <li class="breadcrumb-item active">{{ $selectedCollection->name }}</li>
                        </ol>

                        <button class="btn btn-outline-dark mr-auto" style="height: 40px;">+ Add Deviations</button>
                    </nav>
                    <p>Add new deviations and drag to reorder them. You can also edit your Collection info.</p>

                    <div class="collection-sketches-block">
                        @foreach($selectedCollection->sketches as $sketch)
                        <div class="sketch-item" style="margin:10px;float:left;">
                            <div class="thumbnail-image" style="height: 120px; width: 180px; overflow: hidden; position: relative">
                                <img src="/storage/{{ $sketch->thumbnail ?? '' }}" alt="" width="100%">
                                <div class="corner-order-number" style="position: absolute;top:0;left:0;width:40px;height:40px;background:white;text-align:center;line-height:40px;">1</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>

                <div class="collection-details col">
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
