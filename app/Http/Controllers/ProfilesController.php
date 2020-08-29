<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    //
    public function show($user)
    {
        $user = User::findOrFail($user);

        $join_date = $user->created_at->diffInDays(new \DateTime('now'));

        return view('profile/show', [
            'user' => $user,
            'join_date' => $join_date,
            
        ]);
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
            'image'    => '',
        ]);


        if (request('image')) {
            $imagePath =request('image')->store('avatars', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 300);
            $image->save();
        }

        Auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imagePath]
        ));

        return redirect("/profile/{$user->id}");
    }
}
