
@extends('layouts.app')
@section('title', 'ブックマークされたレシピ一覧')
@section('content')

    <h1>ブックマークされたレシピ一覧</h1>

    @if ($bookmarkedRecipes->isEmpty())
        <p>ブックマークされたレシピはありません。</p>
    @else
        <ul>
            @foreach ($bookmarkedRecipes as $recipe)
                <li>
                    <a href="{{ route('recipe.show', $recipe->id) }}">
                        {{ $recipe->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
