@extends('layouts.app') <!-- layout.appを継承 -->
@section('title', '新規会員登録')<!-- タブに表示される -->
@section('content')


<h1>新規会員登録</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name">名前:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="email">メールアドレス:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="password">パスワード:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <button type="submit">新規登録</button>
        </div>
    </form>

@endsection


<?php
    $hideHeader = true; // ヘッダーを非表示にするための変数セット
?>