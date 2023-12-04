<!--
@extends('layouts.app') 
@section('title', 'ログイン')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col text-center">
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
</div>
</div>
</div>
@endsection



<?php
    $hideHeader = true; // ヘッダーを非表示にするための変数セット
?>
