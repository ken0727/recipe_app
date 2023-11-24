@extends('layouts.app')

@section('title', '投稿一覧')

@section('content')

    <h1>投稿一覧</h1>

    @if ($allPosts)

        @foreach ($allPosts as $post)

            <div>
                <h3>{{ $post->name }}</h3>
                <p>料理名: {{ $post->user->name }}</p>
                <p>材料: {{ $post->material }}</p>
                <p>手順: {{ $post->procedure }}</p>
                @if ($post->image_path)
        <img src="{{ asset($post->image_path) }}" alt="{{ $post->name }}" width="300" height="200">
    @else
        <p>画像はありません。</p>
    @endif
            </div>

        @endforeach

    @else

        <p>投稿はありません。</p>

    @endif

@endsection
