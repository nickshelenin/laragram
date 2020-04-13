@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center pt-4">
        <div class="col-3">
            <img src="{{$user->profile->profileImage($user->profile->image)}}" alt=""
                style="height: 150px; width: 150px; border-radius: 50%; object-fit:cover;">
        </div>

        <div class="col-5">
            <div class="d-flex align-items-baseline justify-content-between">
                <div class="d-flex align-items-center">
                    <h2 class="pr-4 font-weight-light">{{$user->username}}</h2>

                    @cannot('update', $user->profile)
                    <follow-button user-id="{{$user->id}}"></follow-button>
                    @endcannot

                    @can('update', $user->profile)
                    <a href="/{{$user->username}}/edit" class="btn font-weight-bold border">Edit
                        profile</a>
                    @endcan
                </div>

                @can('update', $user->profile)
                <a href="/p/create" class="btn btn-primary font-weight-bold">Add post</a>
                @endcan
            </div>

            <div class="d-flex pt-3">
                <div class="pr-3">
                    <strong>{{$postsCount}}</strong> posts
                </div>

                <div class="pr-3">
                    <a href="/{{$user->username}}/followers" class="text-dark">
                        <strong>{{$followersCount}}</strong> followers
                    </a>
                </div>

                <div>
                    <a href="/{{$user->username}}/following" class="text-dark">
                        <strong>{{$followingCount}}</strong> following
                    </a>
                </div>
            </div>

            <div class="pt-3 font-weight-bold">
                {{$user->profile->name}}
            </div>

            <div>
                <p>{{$user->profile->description}}</p>
            </div>

            <div>
                <a href="{{$user->profile->website}}" target="_blank"
                    class="font-weight-bold">{{$user->profile->website}}</a>
            </div>
        </div>

        <div class="grid-container mt-5">
            @foreach($posts as $post)
            <div class="grid-column">
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" alt="" class="post-image">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection