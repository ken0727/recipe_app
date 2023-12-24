<!-- resources/views/components/search.blade.php -->

<div>
    <form id="searchForm">
        <input type="text" name="search" id="searchInput">
        <button type="button" onclick="executeSearch()">検索</button>
    </form>

    <div id="searchResults"></div>

    <script>
        // Enter キーの検知
        $('#searchInput').on('keyup', function (e) {
            if (e.key === 'Enter') {
                executeSearch();
            }
        });

        function executeSearch() {
            var searchQuery = $('#searchInput').val();
            var searchType = '{{ $searchType }}'; // ビューから直接渡された値を使用

            $.ajax({
                url: '{{ $url }}',
                type: 'GET',
                data: { search: searchQuery, search_type: searchType }, // 検索対象をリクエストに含める
                success: function (data) {
                    // 検索結果がある場合は表示、ない場合は非表示
                    if (data) {
                        $('#searchResults').html(data);
                    } else {
                        $('#searchResults').empty();
                    }
                },
                error: function (error) {
                    console.error('検索エラー:', error);
                }
            });
        }
    </script>
</div>
