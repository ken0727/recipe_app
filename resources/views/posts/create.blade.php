<!-- resources/views/posts/create.blade.php -->

@extends('layouts.app')

@section('title', "新規投稿")

@section('content')

    <div class="container">
                <div class="row justify-content-center">
            <div class="col-md-6">
        <h1 class="mb-4">新しい投稿</h1>

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

            <div class="mb-3">
                <label for="name" class="form-label">名前:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="material" class="form-label">材料:</label>
                <textarea name="material" id="material" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="procedure" class="form-label">手順:</label>
                <textarea name="procedure" id="procedure" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image_path" class="form-label">ファイルアップロード:</label>
                <input type="file" name="image_path" id="image_path" class="form-control" enctype="multipart/form-data">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">投稿する</button>
            </div>
        </form>
    </div>
@endsection


