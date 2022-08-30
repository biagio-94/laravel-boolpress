@extends('layouts.app');

@section('content')
    <div class="container ">
        <form action="{{ route('admin.users.update',$user->id) }}" method="post">
            @csrf
            @method("PATCH")
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">Nome Utente</label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome Utente"
                    value="{{$user->name}}">
                    
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Email Utente</label>
                <input name="email" placeholder="Email Utente" class="form-control" id="exampleFormControlTextarea1"  
               value="{{$user->email}}" >
            </div>
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">Città Utente</label>
                <input name="city" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Città Utente"
                    value="{{$user->city}}">
                    
            </div>
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">Altezza Utente</label>
                <input name="height" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Altezza Utente"
                    value="{{$user->height}}">
                    
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Salva Dati</button>

            </div>
        </form>
    </div>
@endsection
