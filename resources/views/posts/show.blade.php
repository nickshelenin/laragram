@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-7">
            {{-- <img src="/storage/{{ $post->image }}" class="w-100"> --}}
            <img src="/storage/{{$post->image}}" alt="" style="width: 600px; height: 600px; object-fit: cover">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <a href="/profiles/{{ $post->user->id }}">
                        <img src="{{ $post->user->profile->profileImage($post->user->profile->image) }}"
                            class="rounded-circle" style="width: 50px; height: 50px">
                    </a>
                </div>

                <div>
                    <div class="font-weight-bold">
                        <a href="/profiles/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                        <a href="#" class="pl-3">Follow</a>

                        <form action="/p/{{$post->id}}" method="POST">
                            @method('DELETE')
                            @csrf

                            @can('update', $post->user)
                                <button type="submit" class="btn btn-danger">Delete post</button>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>

            <hr>

            <div class="d-flex">
                <span class="font-weight-bold mr-3">
                    <a href="/profiles/{{ $post->user->id }}">
                        <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                </span>

                <p>
                    {{ $post->description }}
                </p>
            </div>
        </div>
    </div>
</div>

@endsection