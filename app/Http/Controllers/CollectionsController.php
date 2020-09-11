<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\User;
use Redirect;
use App\Sketch;

class CollectionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
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

        auth()->user()->collections()->create(array_merge(
            $data,
            ['isCoverSet' => false]
        ));

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('/profile/' . auth()->user()->id);

    }

    
    public function updateAll()
    {
        $collection = Collection::find(request()->collection_id);
        $collection->sketches()->detach();

        foreach (request()->sketches as $sketch) {
            $collection->sketches()->attach($sketch['id'], [
                'order' => $sketch['pivot']['order']
            ]);
        }
        
        return response('Update Success', 200);

    }

    public function removeSketchFromCollection()
    {
        $collection = Collection::findOrFail(request()->collection_id);
        $sketch_id = request()->sketch_id;
        $collection->sketches()->detach($sketch_id);
        return response('Remove Success', 200);
    }

    public function getCollectionsJSON()
    {
        return response()->json(auth()->user()->collections);
    }

    public function getSketchesJSON()
    {
        if(request()->collection_id == 0) {
            $collection = auth()->user(); // hacky as shit
        } else {
            $collection = Collection::findOrFail(request()->collection_id);
        }
        return response()->json($collection->sketches);
    }
    
    // public function setCoverImage()
    // {
    //     $collection = Collection::findOrFail(request()->collection);
    //     $coverImage = request()->coverImage;

    //     return response('Added Cover Image', 200);
    // }

    // public function updateCoverImage(Collection $collection, $coverImage)
    // {
    //     if (!$collection->isCoverSet) {
    //         $collection->coverImage = $coverImage;
    //         $collection->save();
    //     }
    // }

    public function copySketchToCollection()
    {
        $collection = Collection::findOrFail(request()->collection_id);
        $sketch = request()->sketch_id;
        $order = $collection->sketches()->count();
        $order++;

        $collection->sketches()->attach($sketch, [
            'order' => $order
        ]);

        return response($sketch, 200);
    }

    public function moveSketchToCollection()
    {
        $src = Collection::findOrFail(request()->src_id);
        $dst = Collection::findOrFail(request()->dst_id);
        $sketch = request()->sketch_id;
        $order = $dst->sketches()->count();
        $order++;

        $src->sketches()->detach($sketch);
        $dst->sketches()->attach($sketch, [
            'order' => $order
        ]);
        
        $this->updateCoverImage($dst.id, $sketch);
        // $sketch_new = Sketch::findOrFail($sketch);
        // if (!$dst->isCoverSet) {
        //     $dst->coverImage = $sketch_new->thumbnail;
        //     $dst->save();
        // }

        return response('copied over', 200);
    }

    public function show(Collection $collection)
    {
        return view('collections/show', [
            'collection' => $collection
        ]);
    }

    public function addToCollection()
    {
        $sketches = request()->sketches;


        $collection = Collection::findOrFail(request()->collection);

        $order = $collection->sketches()->count();
        $order++;

        foreach($sketches as $sketch) {
            $collection->sketches()->attach($sketch, ['order' => $order]);
            $order++;
        }

        // if (!$collection->isCoverSet) {
        //     $firstSketch = Sketch::find($sketches[0]);
        //     $collection->coverImage = $firstSketch->thumbnail;
        //     $collection->save();
        // }

        return response($sketches, 200);
    }

    public function setCoverImage()
    {
        $sketch     = Sketch::findOrFail(request()->sketch_id);
        $collection = Collection::findOrFail(request()->collection_id);

        $collection->coverImage = $sketch->id;
        $collection->isCoverSet = true;
        $collection->save();    
        return response("cover image is set", 200);    
    }

    public function removeIfCoverImage(Sketch $sketch, Collection $collection)
    {
        if($collection->isCoverSet == true) {
            if($collection->coverImage == $sketch->id) {
                $collection->coverImage = null;
                $collection->isCoverSet = false;
                $collection->save();
            }
        }
    }

    // public function updateCoverImage(Collection $collection, Sketch $sketch)
    // {
    //     if (!$collection->isCoverSet) {
    //         $collection->coverImage = $sketch->thumbnail;
    //         $collection->save();
    //     }
    // }
}
