@extends('layouts.app')

@section('title', $post->name)

@section('content')

<h1>{{ $post->name }}</h1>
@if ($post->image_path)
    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->name }}" width="300" height="200">
@else
    <p>画像はありません。</p>
@endif
<p>材料: {{ $post->material }}</p>
<p>手順: {{ $post->procedure }}</p>
@if (Auth::check())
        @if (Auth::user()->bookmarkRecipes->contains('post_id', $post->id))
            <!-- ブックマーク解除ボタン -->
            <form action="{{ route('unbookmark-recipe', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">ブックマーク解除</button>
            </form>
        @else
            <!-- ブックマークボタン -->
            <form action="{{ route('bookmark-recipe', $post->id) }}" method="POST">
                @csrf
                <button type="submit">ブックマーク</button>
            </form>
        @endif
@endif
@endsection