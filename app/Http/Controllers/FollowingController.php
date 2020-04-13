<?php

namespace App\Http\Controllers;

use App\User;

class FollowingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($username)
    {
        $user = User::where('username', $username)->first();
        $followings = $user->following;

        return view('following', compact('followings'));
    }

    public function store(User $user)
    {
        if ($user->id === auth()->user()->id) {
            return redirect('/');
        }

        return auth()->user()->following()->toggle($user->profile);
    }
}
