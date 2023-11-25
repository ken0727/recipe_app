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
@endsection