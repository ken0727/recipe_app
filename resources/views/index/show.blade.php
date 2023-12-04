@extends('layouts.app')

@section('title', '投稿一覧')

@section('content')
    <h1>投稿一覧</h1>

    @if ($allPosts->isNotEmpty())

        @foreach ($allPosts->chunk(3) as $chunk)
            <div class="row">
                @foreach ($chunk as $post)
                    <div class="col-md-4">
                        <a href="{{ route('posts.show', $post) }}">
                        @if ($post->image_path)
                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->name }}" width="300" height="200">
                            @else
                            <img src="{{ asset('storage/Noimage.jpeg') }}" alt="Noimage" width="300" height="200">
                        @endif
                        <h3>{{ $post->name }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <p>投稿はありません。</p>
    @endif
@endsection
