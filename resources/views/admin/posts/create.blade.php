@extends('layouts.app');

@section('content')
    <div class="container ">
        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFile" class="form-label">Carica imagine</label>
                <input name="cover_img" class="form-control" type="file" id="formFile">
              </div>
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">Nome Post</label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome Post"
                    value="{{ old('name') }}">
                    
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Contenuto Post</label>
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('content') }}</textarea>
            </div>
            <select name="tags[]" id="" multiple>
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Salva Dati</button>

            </div>
        </form>
    </div>
@endsection
