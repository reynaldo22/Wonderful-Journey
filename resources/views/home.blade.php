@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
            <div class="col-sm-4">
                @if (session('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

    <div class="row justify-content-center">
        
        @if(Auth::user()->role == "admin")
        <table class="table text-center">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @foreach($users as $u)
            <tr>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td><a class="btn btn-danger" href="{{url('/'.$u->id.'/delete')}}">Delete</a></td>
            </tr>
            @endforeach
        </table>
        @endif

        @if(Auth::user()->role == "user")
            <h1>Welcome {{Auth::user()->name}}</h1>
        @endif
    </div>
</div>
@endsection
