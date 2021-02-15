@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Blog') }}</div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{url('/create')}}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categories_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                
                                <select name="categories_id" id="categories_id" class="form-control @error('categories_id') is-invalid @enderror">
                                    @foreach($category as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>

                                @error('categories_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    
                                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                    
                                </div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Story') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="description" type="text" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description"> --}}
                                <textarea name="description" value="{{ old('description') }}" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
