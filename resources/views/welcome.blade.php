@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @foreach($data as $d)
        <div class="col-sm-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$d->title}}</h5>
                <p class="card-text">{{ substr($d->description, 0, 50) }} ...<a href="#" >full story</a></p>
                <p class="card-text">category: <a href="#" >{{$d->name}}</a></p>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
        
@endsection
