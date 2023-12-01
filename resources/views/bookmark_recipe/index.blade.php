@extends('layouts.app')

@section('title', 'お気に入り一覧')

@section('content')
    <h1>お気に入り一覧</h1>

    @if ($bookmarkedRecipes->isEmpty())
        <p>ブックマークされたレシピはありません。</p>
    @else
        <div class="row">
            @foreach ($bookmarkedRecipes as $recipe)
                <div class="col-md-4">
                    
                    @if ($recipe->post->image_path)
                        <img src="{{ asset('storage/' . $recipe->post->image_path) }}" alt="{{ $recipe->post->name }}" width="300" height="200">
                    @else
                        <img src="{{ asset('storage/Noimage.jpeg') }}" alt="Noimage" width="300" height="200">
                    @endif
                    <h3>{{ $recipe->post->name }}</h3>
                </div>
            @endforeach
        </div>
    @endif
@endsection
