<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function show($user)
    {
        $user = User::find($user);

        $join_date = $user->created_at->diffInDays(new \DateTime('now'));

        return view('profile/show', [
            'user' => $user,
            'join_date' => $join_date,
            
        ]);
    }
}
