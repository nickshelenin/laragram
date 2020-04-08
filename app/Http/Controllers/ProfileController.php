<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index',
            'show',
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param mixed $user
     * @param mixed $id
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $posts = $user->posts->sortByDesc('created_at');

        $postsCount = Cache::remember("count.posts.{$user->id}", now()->addSeconds(30), function () use ($user) {
            $user->posts->count();
        });

        $followersCount = Cache::remember("count.followers.{$user->id}", now()->addSeconds(30), function () use ($user) {
            $user->profile->followers->count();
        });

        $followingCount = Cache::remember("count.following.{$user->id}", now()->addSeconds(30), function () use ($user) {
            $user->following->count();
        });

        return view('profiles.index', compact('user', 'posts', 'follows', 'postsCount', 'followersCount', 'followingCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // if (auth()->user()->id !== $user->id) {
        //     return redirect("/profiles/{$user->id}");
        // }

        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // if (auth()->user()->id !== $user->id) {
        //     return redirect("/profiles/{$user->id}");
        // }

        $this->authorize('update', $user->profile);

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $profile = $user->profile;
        $profile->name = $request->name;
        $profile->description = $request->description;
        $profile->website = $request->website;

        if ($request->hasFile('image')) {
            $userImage = public_path("storage/{$profile->image}");

            $imagePath = request('image')->store('uploads', 'public');
            $profile->image = $imagePath;
            $profile->save();

            // Delete user's previous profile image if exists
            if (File::exists($userImage)) {
                File::delete($userImage);
            }
        }

        $profile->save();

        return redirect("/profiles/{$user->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
