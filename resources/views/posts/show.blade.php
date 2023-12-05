@extends('layouts.app')

@section('title', $post->name)

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 mb-3 text-left">
                @if ($post->image_path)
                    <div class="mb-3 mt-4"> <!-- mt-4を追加 -->
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->name }}" class="img-fluid rounded mb-3" style="width: 300px; height: 200px;">
                    </div>
                @else
                    <p>画像はありません。</p>
                @endif
            </div>
            <div class="col-md-4 text-left">
                <div class="mb-3">
                    <h5 class="mb-2">材料:</h5>
                    <p>{!! nl2br(e($post->material)) !!}</p>
                </div>
            </div>
            <div class="col-md-4 text-left">
                <div class="mb-3">
                    <h5 class="mb-2">手順:</h5>
                    <p>{!! nl2br(e($post->procedure)) !!}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (Auth::check())
                    <div class="mb-3">
                        @if (Auth::user()->bookmarkRecipes->contains('post_id', $post->id))
                            <!-- ブックマーク解除ボタン -->
                            <form action="{{ route('unbookmark-recipe', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">ブックマーク解除</button>
                            </form>
                        @else
                            <!-- ブックマークボタン -->
                            <form action="{{ route('bookmark-recipe', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">ブックマーク</button>
                            </form>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
