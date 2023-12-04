<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app') <!-- layout.appを継承 -->
@section('title', 'ログイン') <!-- タブに表示される -->

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <h1 class="mb-4">ログイン</h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">メールアドレス:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">パスワード:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">ログイン</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


@endsection

<?php
    $hideHeader = true; // ヘッダーを非表示にするための変数セット
?>
