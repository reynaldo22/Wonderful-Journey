@extends('layouts.app')

@section('content')

<div class="container">

        <div class="row justify-content-center">
            <h1>{{$data['category']->name}}</h1>
        </div>

    <div class="row">
        @foreach($data['article'] as $d)
        <div class="col-sm-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$d->title}}</h5>
                <p class="card-text">{{ substr($d->description, 0, 50) }} ...<a href="{{url('/'.$d->id.'/detail')}}" >full story</a></p>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
        
@endsection
