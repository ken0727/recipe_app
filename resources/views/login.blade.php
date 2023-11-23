@extends('layouts.app') <!-- layout.appを継承 -->
@section('title', 'ログイン')<!-- タブに表示される -->


@section('content')
<h1>ログイン</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">メールアドレス:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="password">パスワード:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <button type="submit">ログイン</button>
        </div>
    </form>

@endsection


<?php
    $hideHeader = true; // ヘッダーを非表示にするための変数セット
?>