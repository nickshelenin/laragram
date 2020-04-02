@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card ">
        <div class="card-body">
            <form method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

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
                        {{-- <input id="description" type="text"
                            class="form-control @error('description') is-invalid @enderror" name="description"
                            value="{{ old('description') }}" autocomplete="description" autofocus value=""> --}}
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