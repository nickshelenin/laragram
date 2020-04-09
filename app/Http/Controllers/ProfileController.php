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
    public function index($id)
    {
        $user = User::where('username', $id)->firstOrFail();

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $posts = $user->posts->sortByDesc('created_at');

        // $postsCount = Cache::remember("count.posts.{$user->id}", now()->addSeconds(30), function () use ($user) {
        //     $user->posts->count();
        // });

        // $followersCount = Cache::remember("count.followers.{$user->id}", now()->addSeconds(30), function () use ($user) {
        //     $user->profile->followers->count();
        // });

        // $followingCount = Cache::remember("count.following.{$user->id}", now()->addSeconds(30), function () use ($user) {
        //     $user->following->count();
        // });

        $postsCount = $user->posts->count();
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();

        return view('profiles.index', compact('user', 'posts', 'follows', 'postsCount', 'followersCount', 'followingCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int   $id
     * @param mixed $username
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        // if (auth()->user()->id !== $user->id) {
        //     return redirect("/profiles/{$user->id}");
        // }

        $user = User::where('username', $username)->firstOrFail();

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
    public function update(Request $request, $username)
    {
        // if (auth()->user()->id !== $user->id) {
        //     return redirect("/profiles/{$user->id}");
        // }

        $user = User::where('username', $username)->firstOrFail();

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

        return redirect("/{$user->username}");
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
