@extends('layouts.app');

@section('content')
    <div class="container ">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">

                <div class=" col">
                    <img width=400px src="{{asset("/storage/" . $post->cover_img)}}" alt="">
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Carica imagine</label>
                        <input name="cover_img" class="form-control" type="file" id="formFile">
                    </div>
    
                    <div class="mb-3 ">
                        <label for="exampleFormControlInput1" class="form-label">Nome Post</label>
                        <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Nome Post" value="{{ $post->name }}">
    
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Contenuto Post</label>
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post->content }}</textarea>
                    </div>
                    <select name="tags[]" id="" multiple>
                        @foreach ($post->tags as $tag)
                            <option value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'selected' : '' }}>
                                {{ $tag->name }}</option>
                        @endforeach
                    </select>
    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Salva Dati</button>
    
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
