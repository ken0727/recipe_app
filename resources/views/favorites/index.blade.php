<!-- resources/views/favorites/index.blade.php -->

@extends('layouts.app')

@section('title', 'お気に入りユーザー一覧')

@section('content')
    <h1>お気に入りユーザー一覧</h1>

    @if($favoriteUsers->isEmpty())
        <p>お気に入りユーザーはありません。</p>
    @else
        <ul>
            @foreach($favoriteUsers as $favoriteUser)
                <li>{{ $favoriteUser->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection
