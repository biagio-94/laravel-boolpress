@extends('layouts.app');
@section('content')
    <div class="container">
        <h1>{{ $post->name }}</h1>

        <a class="link" href="{{ asset('/storage/' . $post->cover_img) }}">
            <img width=400px src="{{ asset('/storage/' . $post->cover_img) }}" alt=""></a>
            <a class="btn btn-success" href="{{route("admin.post.download", $post->id)}}">Scarica</a>
        <p>{{ $post->content }}</p>
        <div>Tags:
            @foreach ($post->tags as $tag)
                <span>{{ $tag->name }}</span>
                @if (!$loop->last)
                    <span> - </span>
                @endif
            @endforeach
        </div>

        <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">Indietro</a>

    </div>
@endsection

