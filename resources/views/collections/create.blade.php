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
                    <label for="name" class="col-md-4 col-form-label text-md-right">Deviant name</label>

                    <div class="col-md-6">
                        <input  id="name" 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name') }}" 
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


                <div class="row pt-4">
                    <button class="btn btn-primary ml-auto">Submit</button>
                </div>

            </div>
        </div>
    </form>    
</div>
@endsection
