<!-- resources/views/test/search_results.blade.php -->

@if($posts->count() > 0)
    <h2>検索結果</h2>
    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->name }}</li>
        @endforeach
    </ul>
@else
    <p>検索結果がありません。</p>
@endif
