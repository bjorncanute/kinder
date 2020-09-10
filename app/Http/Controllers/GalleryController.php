<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Collection;

class GalleryController extends Controller
{
    //
    public function show($username, $collection_id = null)
    {
        $user = User::where('username', $username)->first();
        $watching = (auth()->user()) ? auth()->user()->watching->contains($user->id) : false;


        if (!$collection_id) {
            // super hacky way to trick blade into grabbing all the sketches
            $selectedCollection = $user; 
        } else {
            $selectedCollection = Collection::find($collection_id);
        }

        $collection_list = $user->collections;
        
        return view('gallery.show', compact('user', 'watching', 'selectedCollection', 'collection_list'));
    }



    public function edit($username, $collection)
    {
        $user = User::where('username', $username)->first();
        $selectedCollection = Collection::find($collection);

        return view('gallery.edit_collection', compact('user', 'selectedCollection'));
    }

    public function returnCoverImage(User $user) 
    {
        

        if ($collection_id == 0) {
            $filePath = $user->sketches->first()->thumbnail;
        } else {
            $collection = Collection::find($collection_id);
            $filePath = $collection->sketches->first()->thumbnail;
        }

        $filePath = 'storage/' . $filePath;
        // $filePath = "storage/" . $user->sketches->first()->thumbnail;
        return response()->file($filePath);
    }
}
