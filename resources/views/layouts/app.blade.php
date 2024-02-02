<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <title>@yield('title')</title>
</head>
<body>
    @if (!isset($hideHeader) || !$hideHeader)
        @include('layouts.header') <!-- ヘッダー部分を別ファイルから取り込む -->
        @include('components.navbar')<!-- ナビバーを別ファイルから取り込む -->
    @endif

    
    

    @section('content')

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif


            <div class="container">
                @yield('content')
            </div>



</body>
</html>
