@extends('layouts.app')

@section('title', 'お気に入り一覧')

@section('content')
    <h1>お気に入り一覧</h1>

    @component('components.SearchForm', ['action' => route('bookmarks.index'), 'method' => 'GET', 'placeholder' => 'キーワードを入力', 'name' => 'search', 'buttonText' => '検索'])
    @endcomponent
    <!-- 検索フォーム -->
    <x-search :url="url('/test/search')" :results="$posts ?? []" searchType="bookmarked" />

    @if(request()->has('search') && !empty($searchPosts))
        <div class="row">
            @foreach ($searchPosts->chunk(3) as $chunk)
                @foreach ($chunk as $post)
                    <div class="col-md-4">
                        <div class="post-image-wrapper">
                            <a href="{{ route('posts.show', $post) }}">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->name }}" width="200" height="200">
                                @else
                                    <img src="{{ asset('storage/Noimage.jpeg') }}" alt="Noimage" width="200" height="200">
                                @endif
                                <h3>{{ $post->name }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    @else
        @if ($bookmarkedRecipes->isEmpty())
            <p>ブックマークされたレシピはありません。</p>
        @else
            <div class="row">
                @foreach ($bookmarkedRecipes->chunk(3) as $chunk)
                    @foreach ($chunk as $recipe)
                        <div class="col-md-4">
                            <div class="post-image-wrapper">
                                <a href="{{ route('posts.show', $recipe->post) }}">
                                    @if ($recipe->post->image_path)
                                        <img src="{{ asset('storage/' . $recipe->post->image_path) }}" alt="{{ $recipe->post->name }}" width="200" height="200">
                                    @else
                                        <img src="{{ asset('storage/Noimage.jpeg') }}" alt="Noimage" width="200" height="200">
                                    @endif
                                    <h3>{{ $recipe->post->name }}</h3>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        @endif
    @endif
@endsection
