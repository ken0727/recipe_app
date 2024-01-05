@extends('layouts.app')

@section('title', 'ブックマーク一覧')

@section('content')
    <h1>ブックマーク一覧</h1>

    <x-search :url="url('/test/search')" :results="$posts ?? []" searchType="bookmarked" />

    @if (isset($bookmarkedRecipes) && !$bookmarkedRecipes->isEmpty())

        @foreach ($bookmarkedRecipes->chunk(3) as $chunk)
            <div class="row">
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
            </div>
        @endforeach

    @else

        <p>ブックマークされたレシピはありません。</p>

    @endif
@endsection
