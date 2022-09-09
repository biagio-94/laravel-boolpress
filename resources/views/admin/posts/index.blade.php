@extends('layouts.app');

@section('content')
    <div class="container ">
        <div class="text-center mb-5">
            <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Aggiungi post</a>
        </div>
        <div class="row row-cols-3">
            @foreach ($posts as $post)
                <div class="col">

                    <div  class="card-body mb-5 bg-info py-3 px-2 ">

                        
                        <h4 class="card-title text-center">{{ $post->name }}</h4>
                        <p class="card-text py-3">{{ $post->content }}</p>
                        <h6 class="card-title">Autore: {{ $post->user ? $post->user->name : '' }}</h6>
                        <div>
                            Tags:
                            @foreach ($post->tags as $tag)
                                <span>{{ $tag->name }}</span>
                                @if (!$loop->last)
                                    <span> - </span>
                                @endif
                            @endforeach
                        </div>
                        <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->id) }}">Dettagli</a>
                        <a class="btn btn-success" href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
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
