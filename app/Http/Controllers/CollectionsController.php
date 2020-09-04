<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\User;


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

    public function show(\App\Collection $collection)
    {
        return view('collections/show', [
            'collection' => $collection
        ]);
    }
}
