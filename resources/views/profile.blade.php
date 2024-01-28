<!-- resources/views/profile.blade.php -->

@extends('layouts.app')

@section('title', 'プロフ')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- プロフィール情報の入力欄 -->
                    <div class="mb-3">
                        <label for="name" class="form-label">名前:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', Auth::user()->name) }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">メールアドレス:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', Auth::user()->email) }}">
                    </div>

                    <!-- パスワードの入力欄 -->
                    <div class="mb-3">
                        <label for="current_password" class="form-label">現在のパスワード:</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">新しいパスワード:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">新しいパスワード（確認用）:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>

                    <label for="profile_image" class="form-label">プロフィール画像:</label>
                    <input type="file" class="form-control" name="profile_image" accept="image/*" id="profile_image">

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">更新する</button>
                    </div>
                </form>
            </div>
        </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="text-center">
                    @if(auth()->user()->image_path)
                    <img src="{{ asset('storage/' . $user->image_path) }}" alt="{{ $user->name }}" class="img-fluid rounded" width="200" height="200">
                    @else
                    <img src="{{ asset('images/Noimage.jpeg') }}" alt="Noimage" width="200" height="200">
                    @endif
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection
                
