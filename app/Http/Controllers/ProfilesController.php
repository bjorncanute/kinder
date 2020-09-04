<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    //
    public function home() 
    {
        if (auth()->user()){
            $user_id = auth()->user()->id;
            return redirect("/profile/{$user_id}");
        } else {
            return redirect("/login");
        }
    }

    public function show(User $user)
    {
        $watching = (auth()->user()) ? auth()->user()->watching->contains($user->id) : false;
    
        return view('profile/show', compact('user', 'watching'));

    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profile/edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'tagline'  => '',
            'bio'      => '',
            'pronouns' => '',
            'avatar'    => '',
        ]);

        
        
        if (request('avatar')) {
            $imagePath = request('avatar')->store('avatars', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 300);
            $image->save();

            $imageArray = ['avatar' => $imagePath];
        }
        
        
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }

}
