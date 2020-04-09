<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->first();

        $followers = $user->profile->followers;

        return view('followers', compact('followers'));
    }
}
