@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-7">
            <img src="/storage/{{$post->image}}" alt="" style="width: 600px; height: 600px; object-fit: cover">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <a href="/{{ $post->user->username }}">
                        <img src="{{ $post->user->profile->profileImage($post->user->profile->image) }}"
                            class="rounded-circle" style="width: 50px; height: 50px">
                    </a>
                </div>

                <div>
                    <div class="font-weight-bold">
                        <a href="/{{ $post->user->username }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>

                        @cannot('update', $post->user->profile)
                        <follow-button user-id={{$post->user->id}}></follow-button>
                        @endcannot

                        <form action="/p/{{$post->id}}" method="POST">
                            @csrf
                            @method('DELETE')

                            @can('update', $post->user->profile)
                            <button type="submit" class="btn btn-danger">Delete post</button>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>

            <hr>

            <div class="d-flex">
                @if ($post->description)
                <span class="font-weight-bold mr-3">
                    <a href="/{{ $post->user->username }}">
                        <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                </span>

                <p>
                    {{ $post->description }}
                </p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection