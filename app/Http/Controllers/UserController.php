<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
        public function index(User $user,Request $request)
        {
        $posts = $user->posts; // ユーザーが投稿した一覧を取得

        return view('users.posts', compact('user', 'posts'));
        }

}
