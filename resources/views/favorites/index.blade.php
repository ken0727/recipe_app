<!-- resources/views/favorites/index.blade.php -->

@extends('layouts.app')

@section('title', 'お気に入りユーザー一覧')

@section('content')
    <h1>お気に入りユーザー一覧</h1>

    @if($favoriteUsers->isEmpty())
        <p>お気に入りユーザーはありません。</p>
    @else
        <ul class="user-list">
            @foreach($favoriteUsers as $favoriteUser)
                <li class="user-item">
                    <a href="{{ route('users.posts', $favoriteUser) }}" class="user-link">
                        <img src="{{ asset('storage/' . $favoriteUser->image_path) }}" alt="{{ $favoriteUser->name }}" class="user-image">
                        <div class="user-details">
                            <span class="user-name">{{ $favoriteUser->name }}</span>
                        </div>
                    </a>
                    <span class="post-count">投稿数: {{ $favoriteUser->posts->count() }}</span>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
