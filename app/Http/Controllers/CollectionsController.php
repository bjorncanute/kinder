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
        $collection = \App\Collection::find($collection_id);
        $collection->sketches()->attatch($sketch_id);
    }
}
