@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="list-group">
        @foreach ($followings as $following)
        <li class="list-group-item d-flex justify-content-between w-50 m-auto">
            <div class="d-flex">
                <a href="/{{$following->user->username}}" class="mr-3">
                    <img src="{{$following->profileImage($following->image)}}" alt=""
                        style="height: 50px; width: 50px; border-radius: 50%; object-fit:cover;">
                </a>

                <div class="" style="line-height: 10px">
                    <a href="/{{$following->user->username}}" class="font-weight-bold text-dark">
                        <p>{{$following->user->username}}</p>
                    </a>

                    <p class="text-secondary p5-0">{{$following->name}}</p>
                </div>
            </div>

            <button class="btn btn-primary">following</button>
        </li>
        @endforeach
    </ul>
</div>
@endsection