    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.create') }}"><i class="fas fa-utensils"></i>新規投稿</a>
            </li>
            <li class="nav-item">
            
            <a class="nav-link" href="{{ route('ranking') }}"><i class="fas fa-crown"></i>ランキング</a>
            </li>
            <li class="nav-item">
                
            <a class="nav-link" href="{{ route('bookmarks') }}"><i class="fas fa-star"></i>お気に入り投稿</a>
            </li>
            <li class="nav-item">
                
            <a class="nav-link" href="{{ route('favorite.user') }}"><i class="fas fa-heart"></i>お気に入りユーザー</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <style>
    /* アイコンのサイズを変更 */
    .navbar-nav .nav-link i {
        font-size: 1.5em; /* 1.5倍のサイズに変更 */
        margin-right: 5px; /* アイコンとテキストの間に5pxの右マージンを追加 */
    }
    

    /* ナビゲーションバーのリンクにカーソルが合わさったときのスタイル */
    .navbar-nav .nav-link:hover {
        color: #777777 !important; /* ホバー時の文字色*/
    }

        @media (max-width: 400px) {
    .navbar-toggler {
        order: -1;
    }

    .navbar-collapse {
        flex-basis: auto;
        order: 2;
    }
    }

    </style>