<!-- resources/views/layouts/header.blade.php -->

<head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<header>
        <div class="top-link">
            <a href="/index/{{ Auth::user()->id }}">TOP</a>
        </div>

        <div class="top-link">
            <a href="{{ route('posts.create') }}">投稿する</a>
        </div>

        <div class="top-link">
            <a href="{{ route('bookmark-recipe') }}">お気に入り</a>
            
        </div>
    </div>

        @auth
        <div class="user-info">
            <span>{{ auth()->user()->name }}</span>
        </div>

        <div class="user-info">
            <a href="{{ route('logout') }}">ログアウト</a>
        </div>


        @endauth

    <div class="user-icon">
        <img src="user-icon.png" alt="User Icon"> <!-- ユーザーアイコンの画像を指定 -->
    </div>
</header>
