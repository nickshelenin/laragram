@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row d-flex justify-content-center pt-5">
        <div class="col-3">
            <img src="https://instagram.ffru6-1.fna.fbcdn.net/v/t51.2885-19/s320x320/83213956_3360255157381124_5752385570823208960_n.jpg?_nc_ht=instagram.ffru6-1.fna.fbcdn.net&_nc_ohc=46uU5LDixZ4AX8Qz4Q_&oh=e24fd7bc97e1c0c4e16056834ad1c9e4&oe=5EAE75BE"
                alt="" style="height: 150px; width: 150px; border-radius: 50%">
        </div>
        <div class="col-6">
            <div class="d-flex align-items-baseline justify-content-between">
                <div class="d-flex">
                    <h2 class="pr-4">{{$user->username}}</h2>
                    {{-- <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button> --}}
                    {{-- <button class="btn btn-primary">Follow</button> --}}
                    <a href="/profiles/{{$user->id}}/edit" class="btn btn-block font-weight-bold border">Edit
                        profile</a>
                </div>

                {{-- <a href="/p/create" class="btn btn-primary font-weight-bold">Add post</a> --}}
            </div>

            {{-- <a href="/profile/{{$user->id}}/edit" class="btn btn-primary font-weight-bold">Edit profile</a> --}}

            <div class="d-flex pt-3">
                <div class="pr-3"><strong>363</strong> posts</div>
                <div class="pr-3"><strong>42.6k</strong> followers</div>
                <div><strong>282</strong> following</div>
            </div>

            <div class="pt-3 font-weight-bold">
                {{-- {{$user->profile()->name}} --}}
            </div>

            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, ut est? Cupiditate fuga tenetur
                provident aliquam accusamus illum, id sed iure? Corporis itaque odio eius maxime temporibus earum totam
                laudantium.
            </div>

            <div>
                <a href="" class="font-weight-bold">https://google.com</a>
            </div>

            {{-- <div><a href="{{$user->profile->url}}" class="" target="_blank"></a>
        </div> --}}
    </div>

    <div class="grid-container mt-5">

        {{-- @foreach($user->posts as $post) --}}

        <div class="grid-column">
            <a href="">
                <img src="/assets/img/test.jpg" alt="" class="post-image">
            </a>
        </div>


        <div class="grid-column">
            <a href="">
                <img src="/assets/img/test.jpg" alt="" class="post-image">
            </a>
        </div>

        <div class="grid-column">
            <a href="">
                <img src="/assets/img/test.jpg" alt="" class="post-image">
            </a>
        </div>

        <div class="grid-column">
            <a href="">
                <img src="/assets/img/test.jpg" alt="" class="post-image">
            </a>
        </div>

        {{-- @endforeach --}}
    </div>
</div>

</div>
@endsection