<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;


class CollectionsController extends Controller
{
    //

    public function addToCollection($collection_id, $sketch_id)
    {
        // $user = auth()->user();
        // $user->collection
        // $collection = \App\Collection::find($collection_id);
        // $collection->sketches()->attach($sketch_id);
    }

    public function create()
    {
        return view('collections.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required'     
        ]);

        auth()->user()->collections()->create($data);

        return redirect('/profile/' . auth()->user()->id);

    }

    public function show(\App\Collection $collection)
    {
        return view('collections/show', [
            'collection' => $collection
        ]);
    }
}
