<form action="{{ $action }}" method="{{ $method }}" class="my-custom-form">
    <div class="input-group mb-3">
        <input type="text" class="form-control my-custom-input" placeholder="{{ $placeholder }}" name="{{ $name }}">
        <button class="btn btn-primary my-custom-button" type="submit">{{ $buttonText }}</button>
    </div>
</form>

<style>
    /* カスタムスタイルの追加 */
    .my-custom-form {
        /* ここにフォーム全体のスタイルを追加 */
        margin-bottom: 20px;
    }

    .my-custom-input {
        /* ここにテキスト入力部分のスタイルを追加 */
        border-color: #a9a9a9;
        border-radius: 5px 0 0 5px; /* 左側の角を丸くする */
    }

    .my-custom-button {
        /* ここにボタンのスタイルを追加 */
        background-color: #696969;
        color: #ffffff;
        border-radius: 0 5px 5px 0; /* 右側の角を丸くする */
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function executeSearch() {
        var searchQuery = $('#searchInput').val();
        var currentUrl = $('#searchForm').attr('action');

        $.ajax({
            url: currentUrl,
            type: '{{ $method }}',
            data: { '{{ $name }}': searchQuery },
            success: function (data) {
                // 検索結果を表示する場所に結果をセットする（例: #searchResults）
                $('#searchResults').html(data);
            },
            error: function (error) {
                console.error('検索エラー:', error);
            }
        });
    }
</script>
