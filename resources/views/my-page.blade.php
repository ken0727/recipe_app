@extends('layouts.app')
@section('title', 'マイページ')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="text-center">
                @if ($user->image_path)
                    <img src="{{ asset('storage/' . $user->image_path) }}" alt="{{ $user->name }}" class="img-fluid rounded">
                @else
                    <img src="{{ asset('images/Noimage.jpeg') }}" alt="Noimage" class="img-fluid rounded">
                @endif
            </div>
        </div>
    </div>
</div>


<h2>{{ $user->name }}</h2>
<a href="{{ route('profile.show') }}">プロフィールを編集する</a>

<h2>自分の投稿一覧</h2>

@include('components.search_box', ['url' => url('/test/search'), 'searchType' => 'user'])

<div id="postList">
@if ($posts->isEmpty())
    <p>投稿はありません。</p>
@else
    <div class="row">
        @foreach ($posts as $recipe)
            <div class="col-md-4">
                <div class="post-image-wrapper">
                    <a href="{{ route('posts.show', $recipe) }}">
                    <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->name }}" width="200" height="200">
                    <h3>{{ $recipe->name }}</h3>
                    </a>
                    <!--
                    @if ($recipe->user_id == auth()->id())
                        <div class="btn-group" role="group">
                            <div class="mojiwhite">
                            <a href="{{ route('posts.edit', $recipe) }}" class="btn btn-success">編集</a>
                            </div>
                            
                            <form action="{{ route('posts.destroy', $recipe) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </div>
                    @endif
                    <-->
                </div>
            </div>
        @endforeach
    </div>
@endif
</div>

@endsection
