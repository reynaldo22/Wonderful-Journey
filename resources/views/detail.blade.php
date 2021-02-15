@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="/images/{{$data->image}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$data->title}}</h5>
                <p class="card-text">{{$data->description}}</p>
                <a href="{{ url('/') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>
        
@endsection
