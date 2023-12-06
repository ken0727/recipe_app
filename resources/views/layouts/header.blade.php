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
                <!-- 他のユーザー情報に関連するリンクなどもここに追加できます -->
                <a href="{{ route('bookmarks') }}">お気に入り投稿</a>
                <a href="{{ route('bookmarks') }}">お気に入りユーザー</a>
                <a href="{{ route('logout') }}">ログアウト</a>
            </div>
        </div>
    </div>
    @endauth

    <script>
        $(document).ready(function () {
            $("#user-icon-dropdown").click(function (event) {
                event.stopPropagation();
                // ドロップダウンの表示位置を調整
                $("#user-dropdown-content").toggle().position({
                    my: "right top",
                    at: "right bottom",
                    of: this,
                    collision: "flipfit"
                });
            });

            $(document).on("click", function (event) {
                if (!$(event.target).closest("#user-icon-dropdown").length) {
                    $("#user-dropdown-content").hide();
                }
            });
        });
    </script>

</header>
