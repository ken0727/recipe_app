@extends('layouts.app')
@section('title', 'マイページ')
@section('content')

@if ($user->image_path)
    <img src="{{ asset('storage/' . $user->image_path) }}" alt="{{ $user->name }}" width="200" height="200">
@else
    <img src="{{ asset('storage/Noimage.jpeg') }}" alt="Noimage" width="300" height="200">
@endif
<h2>{{ $user->name }}</h2>
<a href="{{ route('profile.show') }}">プロフィールを編集する</a>

<h2>自分の投稿一覧</h2>

@if ($posts->isEmpty())
    <p>投稿はありません。</p>
@else
    <div class="row">
        @foreach ($posts as $recipe)
            <div class="col-md-4">
                <div class="post-image-wrapper">
                    @if ($recipe->user_id == auth()->id())
                        <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->name }}" width="300" height="200">
                        <h3>{{ $recipe->name }}</h3>
                        <a href="{{ route('posts.edit', $recipe) }}">編集</a>
                    @else
                        <img src="{{ asset('storage/Noimage.jpeg') }}" alt="Noimage" width="300" height="200">
                        <h3>{{ $recipe->name }}</h3>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
