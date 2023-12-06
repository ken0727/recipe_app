<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userPosts(User $user)
{
    $posts = $user->posts; // ユーザーが投稿した一覧を取得

    return view('users.posts', compact('user', 'posts'));
}
}
