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
            <div class="top-link header-button">

    <form id="withdraw-form" method="post" action="{{ route('withdraw') }}">
        @csrf
        @method('delete')
        <!-- JavaScriptを使用して確認メッセージを表示し、ユーザーがOKを選択したらフォームをサブミット -->
        <a href="javascript:void(0);" class="withdraw-link" onclick="confirmWithdraw()">退会する</a>
        <script>
            function confirmWithdraw() {
                // 確認ダイアログを表示
                var confirmation = confirm("本当に退会しますか？");

                // ユーザーがOKを選択した場合、フォームをサブミット
                if (confirmation) {
                    document.getElementById('withdraw-form').submit();
                }
            }
        </script>
    </form>
</div>
            </div>
        </div>
    </div>
    @endauth

</header>
