@extends('layouts.app');
@section('content')
    <div class="container">
        <h1>Nome: {{$user->name}}</h1>
        <p>Email: {{$user->email}}</p>
        <p>Città: {{$userDetail ? $user->userDetail->city : ""}}</p>
        <p> Altezza: {{$userDetail ? $user->userDetail->height : ""}}</p>
        

        <a class="btn btn-primary" href="{{route("admin.users.index")}}">Indietro</a>
    </div>

@endsection
