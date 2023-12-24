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

    <!-- 検索フォーム -->
<x-search :url="url('/test/search')" :results="$posts ?? []" searchType="" />

    <ul id="postList">
        @foreach ($postNames as $name)
            <li>{{ $name }}</li>
        @endforeach
    </ul>


</body>
</html>
