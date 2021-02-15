@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">

        <a class="btn btn-info mb-3" href="{{url('/create')}}">+ Create New Blog</a>

        <table class="table text-center">
            <tr>
                <th>Title</th>
                <th>Action</th>
            </tr>
            @foreach($data as $d)
            <tr>
                <td>{{$d->title}}</td>
                <td><a class="btn btn-danger" href="{{url('/'.$d->id.'/delete')}}">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
