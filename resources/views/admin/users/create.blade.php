@extends('layouts.app');

@section('content')
    <div class="container ">
        <form action="{{ route('admin.users.store') }}" method="post">
            @csrf
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">Nome Utente</label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome Utente"
                    value="{{ old('name') }}">
                    
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Email Utente</label>
                <input type="text" name="email" class="form-control" id="exampleFormControlTextarea1" placeholder="Email Utente" value="{{old('email')}}"  >
            </div>

            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">Città Utente</label>
                <input name="city" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Città Utente"
                    value="{{old("city")}}">
                    
            </div>
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">Altezza Utente</label>
                <input name="height" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Altezza Utente"
                    value="{{old("height")}}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Salva Dati</button>

            </div>
        </form>
    </div>
@endsection
