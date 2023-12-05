@extends('layouts.app')

@section('title', $post->name)

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 mb-3 text-left image-container">
                @if ($post->image_path)
                    <div class="mb-3 mt-4">
                            <h3>{{ $post->name }}</h3>
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->name }}" class="img-fluid rounded mb-3" style="width: 300px; height: 200px;">
                    </div>
                @else
                    <p>画像はありません。</p>
                @endif
            </div>
            <div class="col-md-4 text-left">
                <div class="mb-3">
                    <h5 class="mb-2">材料:</h5>
                    <p>{!! nl2br(e($post->material)) !!}</p>
                </div>
            </div>
            <div class="col-md-4 text-left">
                <div class="mb-3">
                    <h5 class="mb-2">手順:</h5>
                    <p>{!! nl2br(e($post->procedure)) !!}</p>
                </div>
            </div>
        </div>

<div class="row">
    <div class="col-md-12">
        @if (Auth::check())
            <div class="mb-3">
                @if (Auth::id() === $post->user_id)
                    <!-- 編集ボタン -->
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-success">編集</a>
                @else
                    <!-- ブックマークボタン -->
                    @if (Auth::user()->bookmarkRecipes->contains('post_id', $post->id))
                        <form action="{{ route('unbookmark-recipe', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">ブックマーク解除</button>
                        </form>
                    @else
                        <form action="{{ route('bookmark-recipe', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">ブックマーク</button>
                        </form>
                    @endif
                @endif
            </div>
        @endif
    </div>
</div>

        <div class="row">
            <div class="col-md-12 text-center">
                <p>投稿者: {{ $post->user->name }}</p>
            </div>
        </div>
    </div>

@endsection
