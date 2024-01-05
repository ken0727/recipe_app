<!-- resources/views/components/search-results.blade.php -->

<p>検索キーワードの中身: {{ $searchKeyword ?? '未設定' }}</p>

<div>
    @if ($posts->isNotEmpty())
        @foreach ($posts->chunk(3) as $chunk)
            <div class="row">
                @foreach ($chunk as $post)
                    <div class="col-md-4">
                        <div class="post-image-wrapper">
                            <a href="{{ route('posts.show', $post) }}">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->name }}" width="200" height="200">
                                @else
                                    <img src="{{ asset('storage/Noimage.jpeg') }}" alt="Noimage" width="200" height="200">
                                @endif
                                <h3>{{ $post->name }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <p>検索結果はありません。</p>
    @endif
</div>
