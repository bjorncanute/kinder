<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SketchesController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show(\App\User $user, \App\Sketch $sketch)
    {
        // $this->middleware('auth');
        // dd($user, $sketch);
        return view('sketches/show', [
            'sketch' => $sketch,
            'user'   => $user,
        ]);
    }
    
    public function create()
    {
        return view('sketches.create');
    }

    public function store()
    {
        $data = request()->validate([
            'description' => '',
            'title' => 'required',
            'image' => ['required', 'image'],
            
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $thumbPath = request('image')->store('uploads/thumbnails', 'public');

        // $filenameWithExtension = request('image')->getClientOriginalName();
        // $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
        // $extension = request('image')->getClientOriginalExtension();
        // $filenameFullsize  = $filename.'_'.time().'.'.$extension;
        // $filenameThumbnail = $filename.'_thumbnail_'.time().'.'.$extension;

        // // upload files
        // request('image')->storeAs('public/storage/uploads/', $filenameFullsize);
        // request('image')->storeAs('public/storage/uploads/thumbnails', $filenameThumbnail);

        // $thumbnailPath = public_path('storage/uploads/thumbnails/'.$filenameThumbnail);
        // $this->createThumbnail($thumbnailPath, 120, 298);

        // dd($filenameThumbnail);

        // save fullsize image
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();
        
        // save a thumbnail
        $thumb = Image::make(public_path("storage/{$thumbPath}"))->resize(null, 298, function($constraint) {
            $constraint->aspectRatio();
        });
        $thumb->save();


        
        auth()->user()->sketches()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imagePath,
            'thumbnail' => $thumbPath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    
    
    public function createThumbnail($path, $width, $height)
    {
        $image = Image::make($path)->resize($width, $height, function($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($path);
    }
}
