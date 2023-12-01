<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookmarkRecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyPageController;

// 新規会員登録フォーム表示
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// 新規会員登録処理
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/', function () {
    return view('top');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');



//
Route::middleware(['auth'])->group(function () {
    // ユーザーごとの投稿一覧を表示するルート
    Route::get('/index/{user_id}', [IndexController::class, 'show'])->name('user.posts.index');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');//login
Route::post('/login', [LoginController::class, 'login']);//login
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');//ログアウト

// 新しい投稿作成ページ
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// 新しい投稿を保存
Route::get('/posts', [PostController::class, 'store'])->name('posts.store');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/index/{user_id}', [PostController::class, 'index'])->name('user.index');

//投稿の詳細
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/bookmark-recipe/{postId}', [BookmarkRecipeController::class, 'bookmarkRecipe'])->name('bookmark-recipe');
Route::delete('/unbookmark-recipe/{postId}', [BookmarkRecipeController::class, 'unbookmarkRecipe'])->name('unbookmark-recipe');

Route::get('/bookmarks', [BookmarkRecipeController::class, 'index'])->name('bookmarks');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/my-page', [MyPageController::class, 'show'])->name('my-page.show');

Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

