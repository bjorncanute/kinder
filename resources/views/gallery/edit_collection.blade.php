@extends('layouts.app')

@section('content')
<div class="popup-blackout" style="background:black;position:absolute;top:90px;bottom:0;left:0;right:0;">
    <!-- <form action="/{{$user->username}}/gallery/{{ $selectedCollection->id }}" enctype="multipart/form-data" method="post"> -->

    <!-- @csrf -->
    <!-- @method('PATCH') -->
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

                        <form action="/collections/{{ $selectedCollection->id }}/add/" method="post">
                            @csrf
                            <label for="sketch_id">Collection Title</label>
                            <input  id="sketch_id" 
                                    type="text" 
                                    class="form-control @error('sketch_id') is-invalid @enderror" 
                                    name="sketch_id" 
                                    value="{{ old('sketch_id') ?? $selectedCollection->sketch_id }}" 
                                    required 
                                    autocomplete="sketch_id" 
                                    autofocus>

                            @error('sketch_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <button class="btn btn-outline-dark mr-auto" style="height: 40px;">+ Add Deviations</button>
                        </form>
                        <modal-add-sketch></modal-add-sketch>
                    </nav>
                    <p>Add new deviations and drag to reorder them. You can also edit your Collection info.</p>

                    <table-draggable :collection="{{$selectedCollection}}"
                             :sketches="{{$selectedCollection->sketches}}"
                             :collections_list="{{$user->collections}}"></table-draggable>
                    
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

        <hr>

  <!-- use the modal component, pass in the prop -->
        
        <!-- <div class="container" style="background: white;">
            <h3>New Vue Component version</h3>

            <table-draggable :collection="{{$selectedCollection}}"
                             :sketches="{{$selectedCollection->sketches}}"
                             :collections_list="{{$user->collections}}"></table-draggable>
        </div> -->

        
    <!-- </form>   -->
</div>
@endsection
