@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/art" enctype="multipart/form-data" method="post">

        @csrf

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Add New Sketch</h1>
                </div>
            
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">Deviant Title</label>

                    <div class="col-md-6">
                        <input  id="title" 
                                type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                name="title" 
                                value="{{ old('title') }}" 
                                required 
                                autocomplete="title" 
                                autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                    <div class="col-md-6">
                        <textarea   id="description" 
                                    type="textarea" 
                                    class="form-control @error('description') is-invalid @enderror" 
                                    name="description"
                                    rows="4" 
                                    value="{{ old('description') }}" 
                                    autocomplete="description"></textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Image Upload</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary ml-auto">Submit</button>
                </div>

            </div>
        </div>
    </form>    
</div>
@endsection
