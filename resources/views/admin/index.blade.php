@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route("logout")}}" method="POST">
                        @csrf
                    <button type="submit">LOGOUTs</button></form>
                        
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col bg-danger text-center m-5 py-3 px-3"><a href="{{route("admin.posts.index")}}">Posts</a></div>
        <div class="col bg-danger text-center m-5 py-3 px-3"><a href="{{route("admin.users.index")}}">Users</a></div>

    </div>
</div>
@endsection
