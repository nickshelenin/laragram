@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="list-group">
        @foreach ($followers as $follower)
        <li class="list-group-item d-flex justify-content-between w-50 m-auto">
            <div class="d-flex">
                <a href="/{{$follower->username}}" class="mr-3">
                    <img src="{{$follower->profile->profileImage($follower->profile->image)}}" alt=""
                        style="height: 50px; width: 50px; border-radius: 50%; object-fit:cover;">
                </a>

                <div class="" style="line-height: 10px">
                    <a href="/{{$follower->username}}" class="font-weight-bold text-dark">
                        <p>{{$follower->username}}</p>
                    </a>

                    <p class="text-secondary p5-0">{{$follower->profile->name}}</p>
                </div>
            </div>

            <follow-button user-id={{$follower->id}}></follow-button>
        </li>
        @endforeach
    </ul>
</div>
@endsection