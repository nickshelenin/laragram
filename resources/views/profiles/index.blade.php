@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center pt-4">
        <div class="col-3">
            {{-- <img src="/storage/{{$user->profile->image ?? 'uploads/default-image.jpg'}}" alt=""
            style="height: 150px; width: 150px; border-radius: 50%; object-fit:cover;"> --}}

            <img src="{{$user->profile->profileImage($user->profile->image)}}" alt=""
                style="height: 150px; width: 150px; border-radius: 50%; object-fit:cover;">
        </div>
        <div class="col-5">
            <div class="d-flex align-items-baseline justify-content-between">
                <div class="d-flex">
                    <h2 class="pr-4">{{$user->username}}</h2>
                    <button class="btn btn-primary">Follow</button>

                    @can('update', $user)
                        <a href="/profiles/{{$user->id}}/edit" class="btn font-weight-bold border mb-2">Edit
                            profile</a>
                    @endcan
                </div>

                @can('update', $user)
                <a href="/p/create" class="btn btn-primary font-weight-bold">Add post</a>
                @endcan

            </div>

            <div class="d-flex pt-3">
                <div class="pr-3"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-3"><strong>42.6k</strong> followers</div>
                <div><strong>282</strong> following</div>
            </div>

            <div class="pt-3 font-weight-bold">
                {{$user->profile->name}}
            </div>

            <div>
                <p>{{$user->profile->description}}</p>
            </div>

            <div>
                <a href="{{$user->profile->website}}" target="_blank"
                    class="font-weight-bold">{{$user->profile->website ?? ''}}</a>
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