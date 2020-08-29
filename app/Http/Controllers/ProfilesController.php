<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
            'image'    => 'image',
        ]);

        Auth()->user()->profile->update($data);

        return redirect("/profile/{$user->id}");
    }
}
