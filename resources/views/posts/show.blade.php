@extends('layouts.app')

@section('title', $post->name)

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 mb-3 text-left image-container">
                @if ($post->image_path)
                    <div class="mb-3 mt-4">
                            <h3>{{ $post->name }}</h3>
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->name }}" class="img-fluid img-smaller rounded mb-3">
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
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-success mojiwhite">編集</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('本当に削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
                    
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

@if(auth()->check() && auth()->user()->id !== $post->user_id)
<form action="{{ route('users.favorite', $user) }}" method="POST">
    @csrf
    <!-- hidden フィールドで現在ログインしているユーザーのIDを送信 -->
    <input type="hidden" name="current_user_id" value="{{ auth()->user()->id }}">
    <!-- hidden フィールドで $post->user_id を送信 -->
    <input type="hidden" name="post_user_id" value="{{ $post->user_id }}">
    <button type="submit" class="favorite-add-button">お気に入りユーザーに追加</button>
</form>
@endif


<form id="like-form" action="{{ route('toggle-like', ['post' => $post->id]) }}" method="POST">
    @csrf
    @method('POST')
    <button type="submit" class="btn btn-outline-danger border-0" data-post-id="{{ $post->id }}">
        @if($post->isLikedBy(Auth::user()))
            いいねを解除する
        @else
            いいねする
        @endif
    </button>
</form>


@endsection



<script>

document.querySelectorAll('.like-button').forEach(button => {
    button.addEventListener('click', function () {
        console.log('ボタンがクリックされました');
    });
});
</script>

