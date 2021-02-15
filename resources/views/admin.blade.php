@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        
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

    </div>
</div>
@endsection
