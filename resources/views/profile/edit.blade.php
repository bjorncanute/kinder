@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">

    @csrf
    @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
            
                <div class="form-group row">
                    <label for="tagline" class="col-md-4 col-form-label text-md-right">Tagline</label>

                    <div class="col-md-6">
                        <input  id="tagline" 
                                type="text" 
                                class="form-control @error('tagline') is-invalid @enderror" 
                                name="tagline" 
                                value="{{ old('tagline') ?? $user->profile->tagline }}" 
                                required 
                                autocomplete="tagline" 
                                autofocus>

                        @error('tagline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pronouns" class="col-md-4 col-form-label text-md-right">Pronouns</label>

                    <div class="col-md-6">
                        <input  id="pronouns" 
                                type="text" 
                                class="form-control @error('pronouns') is-invalid @enderror" 
                                name="pronouns" 
                                value="{{ old('pronouns') ?? $user->profile->pronouns }}" 
                                required 
                                autocomplete="pronouns" 
                                autofocus>

                        @error('pronouns')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bio" class="col-md-4 col-form-label text-md-right">Short Bio</label>

                    <div class="col-md-6">
                        <textarea   id="bio" 
                                    type="textarea" 
                                    class="form-control @error('bio') is-invalid @enderror" 
                                    name="bio"
                                    rows="4" 
                                    autocomplete="bio">{{ old('bio') ?? $user->profile->bio }}
                        </textarea>

                        @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <label for="avatar" class="col-md-4 col-form-label text-md-right">Profile avatar</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control-file" id="avatar" name="avatar">

                        @error('avatar')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary ml-auto">Save Profile</button>
                </div>

            </div>
        </div>
    </form>  
</div>
@endsection
