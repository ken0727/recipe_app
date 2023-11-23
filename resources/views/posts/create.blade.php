@extends('layouts.app')

@section('content')
    <h1>新しい投稿</h1>

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <div>
            <label for="name">名前:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="material">材料:</label>
            <input type="text" name="material" id="material" required>
        </div>

        <div>
            <label for="procedure">手順:</label>
            <textarea name="procedure" id="procedure" rows="4" required></textarea>
        </div>

        <div>
            <label for="image">画像:</label>
            <input type="file" name="image" id="image">
        </div>

        <div>
            <button type="submit">投稿する</button>
        </div>
    </form>
@endsection

