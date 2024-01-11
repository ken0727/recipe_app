<!-- resources/views/components/search_box.blade.php -->

<div class="my-custom-form">
    <form id="searchForm">
        <div class="search-wrapper">
            <input type="text" name="search" id="searchInput" class="my-custom-input" placeholder="検索したいレシピ名を入力">
            <button type="button" onclick="executeSearch()" class="my-custom-button">
                <i class="fas fa-search"></i> <!-- 虫眼鏡アイコン -->
            </button>
        </div>
        <input type="hidden" name="search_type" value="{{ $searchType }}">
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
            
            // 検索ボックスが空であれば検索を実行しない
            if (searchQuery.trim() === '') {
                return;
            }
            
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
