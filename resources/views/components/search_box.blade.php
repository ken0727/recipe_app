<!-- resources/views/components/search_box.blade.php -->

<div class="my-custom-form"> 
    <form id="searchForm">
        <input type="text" name="search" id="searchInput" class="my-custom-input"> 
        <input type="hidden" name="search_type" value="{{ $searchType }}">
        <button type="button" onclick="executeSearch()" class="my-custom-button">検索</button> 
    </form>

    <div id="searchResults" style="display: none;"></div>


    <script>
        // ページ読み込み時にボックスにフォーカスを当てる
        $(document).ready(function() {
            $('#searchInput').focus();
        });

        // キープレスイベントを監視して Enter キーが押されたら検索を実行
        $('#searchInput').keypress(function(event) {
            if (event.which === 13) { // Enter キーのキーコードは 13
                executeSearch();
                return false; // フォームのデフォルトのサブミットを防ぐ
            }
        });

        function executeSearch() {
            var searchQuery = $('#searchInput').val();
            var searchType = '{{ $searchType }}';

            $.ajax({
                url: '{{ $url }}',
                type: 'GET',
                data: { search: searchQuery, search_type: searchType },
                success: function (data) {
                    if (data) {
                        $('#searchResults').html(data);
                        $('#searchResults').show();

                        // 他のビューを非表示にする
                        $('#postList').hide();
                        $('#searchResultsContainer').hide();
                    } else {
                        $('#searchResults').empty();
                        $('#searchResults').hide();
                    }
                },
                error: function (error) {
                    console.error('検索エラー:', error);
                }
            });
        }
    </script>
</div>


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
        width: 300px; /* 入力スペースの幅を広げる */
        
    }

    .my-custom-button {
        /* ここにボタンのスタイルを追加 */
        background-color: #696969;
        color: #ffffff;
        border-radius: 0 5px 5px 0; /* 右側の角を丸くする */

        cursor: pointer; /* ポインターを表示 */
    }
</style>
