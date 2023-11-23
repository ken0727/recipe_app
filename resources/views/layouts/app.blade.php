<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    @if (!isset($hideHeader) || !$hideHeader)
        @include('layouts.header') <!-- ヘッダー部分を別ファイルから取り込む -->
    @endif
    
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
