@extends('layouts.app')

@section('title', "ランキング")

@section('content')
    <h1>いいねランキング</h1>

    <div class="ranking-posts">
        @foreach ($rankingPosts as $key => $post)
            <div class="ranking-post">
                <p class="post-name">
                    @if ($key === 0)
                        <img src="{{ asset('storage/gold-crown-icon.png') }}" alt="Gold Crown" class="crown-icon">
                    @elseif ($key === 1)
                        <img src="{{ asset('storage/silver-crown-icon.png') }}" alt="Silver Crown" class="crown-icon">
                    @elseif ($key === 2)
                        <img src="{{ asset('storage/bronze-crown-icon.png') }}" alt="Bronze Crown" class="crown-icon">
                    @endif
                    {{ $post->name }}
                </p>
                @if ($post->image_path)
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->name }}" class="post-image" width="200" height="200">
                @else
                    <img src="{{ asset('storage/app/public/Noimage.jpeg') }}" alt="{{ $post->name }}" class="post-image" width="200" height="200">
                @endif
                <p class="like-count">いいね数: {{ $post->like_count }}</p>
            </div>
        @endforeach
    </div>
@endsection
