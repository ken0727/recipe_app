<!-- resources/views/layouts/header.blade.php -->

<head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/dropdown.js') }}"></script>
</head>

<header>
    <div class="top-link">
        <a href="/index/{{ Auth::user()->id }}"><i class="fas fa-home"></i>TOP</a>
    </div>


    @auth
    <div class="user-info">
        <div class="dropdown">
            <div id="user-icon-dropdown" class="user-icon">
                @if(auth()->user()->image_path)
                    <img src="{{ asset('storage/' . auth()->user()->image_path) }}" alt="User Icon">
                @else
                    <img src="{{ asset('images/Noimage.jpeg') }}" alt="No Image">
                @endif
                <div class="top-link">
        <span>Myメニュー</span>
    </div>
            </div>
            
            <div id="user-dropdown-content">
                <a href="{{ route('my-page.show') }}">マイページ</a>
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

    <style>
    
    .top-link:hover {
        color: #777777; /* ホバー時の文字色 */
        text-decoration: none; /* ホバー時にアンダーラインを削除 */
    }

    .user-icon:hover img {
        filter: brightness(80%); /* 画像の明るさを変更 */
    }

    .user-icon {
        cursor: pointer; /* カーソルを人差し指に変更 */
    }
</style>

</header>
