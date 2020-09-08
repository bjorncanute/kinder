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
        // $user = auth()->user();
        
        // return view('collections.create', compact('user'));
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

    public function add_sketch(Collection $collection)
    {
        // dd(request()->all());
        $data = request()->validate([
            'sketch_id' => 'required'
        ]);
        $count = $collection->sketches()->count();
        $sketch_id = $data['sketch_id'];

        $collection->sketches()->attach($sketch_id, [
            'order' => $count + 1
        ]);

        return Redirect::back();

    }

    public function updateAll()
    {
        // $collection = Collection::find(1);// hard coded fix later
        $collection = Collection::find(request()->collection_id);

        $collection->sketches()->detach();

        foreach (request()->sketches as $sketch) {
            $collection->sketches()->attach($sketch['id'], [
                'order' => $sketch['pivot']['order']
            ]);
        }

        
        return response('Update Success', 200);

    }

    public function removeSketch()
    {
        $collection = Collection::findOrFail(request()->collection_id);
        $sketch_id = request()->sketch_id;
        $collection->sketches()->detach($sketch_id);
        return response('Remove Success', 200);
    }







    public function copySketch(Collection $collection, $sketch)
    {
        $order = $collection->sketches->count();
        $collection->sketches()->attach($sketch, [
            'order' => $order + 1
        ]);
        return response('Update Success', 200);
    }












    public function moveSketch(Collection $src, Collection $dst)
    {
        $sketch = request()->sketch;
        $order = $dst->sketches()->count();

        $src->sketches()->detach($sketch);
        $dst->sketches()->attach($sketch, [
            'order' => $order + 1
        ]);

        return Redirect::back();
    }

    public function show(\App\Collection $collection)
    {
        return view('collections/show', [
            'collection' => $collection
        ]);
    }


    public function get()
    {
        $user_id = auth()->user()->id;
        $collections = Collection::where('user_id', $user_id)->get();
        return response()->json($collections);

    }

    public function getSketches()
    {
        // $collection_id = request()->data('collection_id');
        $collection = Collection::findOrFail(request()->collection_id);
        // $collection = Collection::find($collection_id);
        $sketches = $collection->sketches;
        return response()->json($collection->sketches);
    }

    public function add(Request $request)
    {
        // $sketches = $request->sketches;
        $collection = Collection::findOrFail(request()->collection);

        foreach($sketches as $sketch) {
            $collection->sketches()->attach($sketch);
        }
        return response(sketches, 200);


    }
}
