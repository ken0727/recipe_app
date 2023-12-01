<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
        public function show()
    {
        $user = Auth::user(); // ログイン中のユーザーを取得
        $posts = $user->posts; // ユーザーが投稿した全ての投稿データを取得

        return view('my-page',compact('user',"posts"));
    }
}
