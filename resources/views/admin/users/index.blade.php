@extends('layouts.app');

@section('content')
    <div class="container ">
        <div class="text-center mb-5">
            <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Aggiungi utente</a>
        </div>
        <div class="row row-cols-3">
            @foreach ($users as $user)
                <div class="col">
                
                    
                    <div class="card-body mb-5 bg-info">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                        <a class="btn btn-primary" href="{{ route('admin.users.show', $user->id) }}">Dettagli</a>
                        <a class="btn btn-success" href="{{ route('admin.users.edit', $user->id) }}">Modifica</a>
                        <form  action="{{route("admin.users.destroy",$user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"type="submit">Elimina</button>
                            </form>
                      </div>


                   
                </div>
            @endforeach
        </div>
        <div class="text-center mb-5">
            <a class="btn btn-primary" href="{{ route('admin.index') }}">Indietro</a>
        </div>
    </div>
@endsection