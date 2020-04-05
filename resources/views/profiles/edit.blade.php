@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card ">
        <div class="card-body">
            <form method="POST" action="/profiles/{{$user->id}}" enctype="multipart/form-data">
                {{-- <form action="{{action('ProfileController@update', $user->id)}}" enctype="multipart/form-data"
                method="POST"> --}}
                @method('PATCH')
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ $user->name }}" autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="website" class="col-md-4 col-form-label text-md-right font-weight-bold">Website</label>

                    <div class="col-md-6">
                        <input id="website" type="text" class="form-control @error('website') is-invalid @enderror"
                            name="website" value="{{ $user->name }}" autocomplete="website" autofocus>

                        @error('website')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right font-weight-bold">Bio</label>

                    <div class="col-md-6">
                        <textarea name="description" id="description"
                            class="form-control @error('description') is-invalid @enderror" autocomplete="description"
                            autofocus></textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image"
                        class="col-md-4 col-form-label text-md-right font-weight-bold">Profile image</label>

                    <div class="col-md-6">
                        <input type="file" name="image" id="image"  class="form-control-file">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection