<!-- resources/views/layouts/header.blade.php -->

<head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/dropdown.js') }}"></script>
</head>

<header>
    <div class="top-link">
        <a href="/index/{{ Auth::user()->id }}">TOP</a>
    </div>

    <div class="top-link">
        <a href="{{ route('posts.create') }}">投稿する</a>
    </div>

    <div class="top-link">
        <a href="{{ route('ranking') }}">ランキング</a>
    </div>

    <div class="top-link">
        <!-- ユーザーネームを表示 -->
        {{ Auth::check() ? Auth::user()->name : '' }}
    </div>

    @auth
    <div class="user-info">
        <div class="dropdown">
            <div id="user-icon-dropdown" class="user-icon">
                @if(auth()->user()->image_path)
                    <img src="{{ asset('storage/' . auth()->user()->image_path) }}" alt="User Icon">
                @else
                    <img src="{{ asset('storage/Noimage.jpeg') }}" alt="No Image">
                @endif
            </div>
            <div id="user-dropdown-content">
                <a href="{{ route('my-page.show') }}">マイページ</a>
                <a href="{{ route('bookmarks') }}">お気に入り投稿</a>
                <a href="{{ route('favorite.user') }}">お気に入りユーザー</a>
                <a href="{{ route('logout') }}">ログアウト</a>
            </div>
        </div>
    </div>
    @endauth

</header>
