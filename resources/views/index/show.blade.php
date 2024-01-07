@extends('layouts.app')

@section('title', '投稿一覧')

@section('content')
    <h1>投稿一覧</h1>

    <!-- 検索フォーム -->
    @include('components.search_box', ['url' => url('/test/search'), 'searchType' => 'from_index'])

    <div id="postList">
    @if (isset($allPosts) && $allPosts->isNotEmpty())
        @foreach ($allPosts->chunk(3) as $chunk)
            <div class="row">
                @foreach ($chunk as $post)
                    <div class="col-md-4">
                        <div class="post-image-wrapper">
                            <a href="{{ route('posts.show', $post) }}" style="position: relative; display: inline-block;">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->name }}" width="200" height="200">
                                @else
                                    <img src="{{ asset('storage/Noimage.jpeg') }}" alt="Noimage" width="200" height="200">
                                @endif
                                @if (Auth::check() && isset(Auth::user()->bookmarkRecipes) && Auth::user()->bookmarkRecipes->contains('post_id', $post->id))
                                    <!-- ★マークを表示 -->
                                    <span style="position: absolute; top: 0; left: 0; color: gold; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">★</span>
                                @endif
                                <h3>{{ $post->name }}</h3>
                            </a>
                            <form id="like-form" action="{{ route('toggle-like', ['post' => $post->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-outline-danger border-0" data-post-id="{{ $post->id }}">
                                    @if($post->isLikedBy(Auth::user()))
                                        <i class="fas fa-heart"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <p>投稿はありません。</p>
    @endif
    </div>
@endsection
