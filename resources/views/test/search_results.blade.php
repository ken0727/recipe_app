<div style="margin-top: 20px;">
    @if ($posts->isNotEmpty())
        @foreach ($posts->chunk(3) as $chunk)
            <div class="row">
                @foreach ($chunk as $post)
                    <div class="col-md-4">
                        <div class="post-image-wrapper" style="position: relative; display: inline-block;">
                            <a href="{{ route('posts.show', $post) }}">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->name }}" width="200" height="200">
                                @else
                                    <img src="{{ asset('storage/Noimage.jpeg') }}" alt="Noimage" width="200" height="200">
                                @endif
                                <h3>{{ $post->name }}</h3>
                                @if(request()->input('search_type') == 'from_index')
                                    <!-- ★マークを表示 -->
                                    @if (Auth::check() && isset(Auth::user()->bookmarkRecipes) && Auth::user()->bookmarkRecipes->contains('post_id', $post->id))
                                    <span style="position: absolute; top: 0; left: 0; color: gold; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">★</span>
                                    @endif
                                    <!-- ハートの表示も条件分岐 -->
                                    <form id="like-form" action="{{ route('toggle-like', ['post' => $post->id]) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-outline-danger border-0" data-post-id="{{ $post->id }}">
                                            @if($post->isLikedBy(Auth::user()))
                                                <i class="fas fa-heart"></i>
                                            @else
                                                <i class="far fa-heart"></i>
                                            @endif
                                        </button>
                                    </form>
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <p>検索結果はありません</p>
    @endif
</div>

