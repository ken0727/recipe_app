@extends('layouts.app')

@section('title', "投稿編集")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if ($post->image_path)
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->name }}" class="img-fluid rounded mb-3" style="width: 300px; height: 200px;">
                @else
                    <p>画像はありません。</p>
                @endif

                <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">名前:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $post->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="material" class="form-label">材料:</label>
                        <textarea name="material" id="material" class="form-control" rows="4" required>{{ old('material', $post->material) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="procedure" class="form-label">手順:</label>
                        <textarea name="procedure" id="procedure" class="form-control" rows="4" required>{{ old('procedure', $post->procedure) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image_path" class="form-label">ファイルアップロード:</label>
                        <input type="file" name="image_path" id="image_path" class="form-control">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">更新する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
