<!-- resources/views/profile.blade.php -->

@extends('layouts.app')

@section('title', 'プロフ')

@section('content')

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <!-- プロフィール情報の入力欄 -->
        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}">
        </div>

        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}">
        </div>

        <!-- パスワードの入力欄 -->
        <div>
            <label for="current_password">現在のパスワード</label>
            <input type="password" id="current_password" name="current_password">
        </div>

        <div>
            <label for="password">新しいパスワード</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">新しいパスワード（確認用）</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <div>
            <button type="submit">更新する</button>
        </div>

    </form>

    <img src="{{ asset('storage/' .$user->image_path) }}" alt="{{ $user->name }}" width="200" height="200">


@endsection