@extends('layouts.app')

@section('content')
<form method="POST" action="/p" enctype="multipart/form-data">
    {{-- <form action="{{action('ProfileController@update', $user->id)}}" enctype="multipart/form-data"
    method="POST"> --}}
    @csrf

    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right font-weight-bold">Description</label>

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
        <label for="image" class="col-md-4 col-form-label text-md-right font-weight-bold">Image</label>

        <div class="col-md-6">
            {{-- <input type="file" name="image" id="image" class="form-control-file" required> --}}
            <div class="btn btn-primary btn-sm float-left">
                <span>Choose file</span>
                {{-- <input type="file"> --}}
            </div>

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
@endsection