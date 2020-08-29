<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class WatchingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(User $user)
    {
        return auth()->user()->watching()->toggle($user->profile);
    }
}
