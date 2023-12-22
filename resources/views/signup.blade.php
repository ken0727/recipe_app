<!-- resources/views/auth/register.blade.php -->

@extends('layouts.app')
@section('title', '新規会員登録')
@section('content')

<div class="container">
                    <div class="row justify-content-center">
            <div class="col-md-6">
    <h1 class="mb-4">新規会員登録</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">名前:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">メールアドレス:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">パスワード:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">新規登録</button>
        </div>
    </form>
<div class="top-link header-button" style="text-align: right;">
    <a href="{{ route('top') }}">TOPへ</a>
</div>

@endsection

<?php
    $hideHeader = true; // ヘッダーを非表示にするための変数セット
?>
