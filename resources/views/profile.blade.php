@extends('layouts.app')
@section('title', 'プロフ')
@section('content')
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}">
        </div>

        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}">
        </div>

        <!-- 他のユーザー情報の入力欄も必要に応じて追加 -->

        <div>
            <button type="submit">更新する</button>
        </div>
    </form>
@endsection