@extends('layouts.app') <!-- layout.appを継承 -->
@section('title', 'Recipe App')<!-- タブに表示される -->

@section('content')

    <h1>Recipe App</h1>

        <div class="button-container">
        <a href="{{ route('signup') }}" class="gray-button">新規会員登録</a>
    </div>

        <div class="button-container">
        <a href="{{ route('login') }}" class="gray-button">ログイン</a>
    </div>

    <script>
        function handleButtonClick() {
            // ここにボタンクリック時のアクションを記述
            alert('ボタンがクリックされました');
            // 他のアクションや遷移のロジックをここに追加
        }
    </script>


@endsection


<?php
    $hideHeader = true; // ヘッダーを非表示にするための変数セット
?>