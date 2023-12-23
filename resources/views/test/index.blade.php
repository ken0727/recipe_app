<!-- resources/views/test/index.blade.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>

    <!-- jQueryを読み込む -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <h1>Test Page</h1>

    <!-- 例: resources/views/index.blade.php -->

    <form id="searchForm">
        <input type="text" name="search" id="searchInput">
        <button type="button" onclick="executeSearch()">検索</button>
    </form>

    <div id="searchResults"></div>

    <ul id="postList">
        @foreach ($postNames as $name)
            <li>{{ $name }}</li>
        @endforeach
    </ul>

    <script>
        function executeSearch() {
            var searchQuery = $('#searchInput').val();

            $.ajax({
                url: '/test/search',
                type: 'GET',
                data: { search: searchQuery },
                success: function (data) {
                    $('#searchResults').html(data);
                    // 検索結果がある場合は投稿リストを非表示にする
                    $('#postList').hide();
                },
                error: function (error) {
                    console.error('検索エラー:', error);
                }
            });
        }
    </script>
</body>
</html>
