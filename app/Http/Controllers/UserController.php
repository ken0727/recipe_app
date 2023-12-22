<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

        public function withdraw(){

        $user = Auth::user();

        if ($user) {
            // ユーザーを削除する前に、関連するデータも削除するなどの必要な処理を行うこと
        $user->delete();

            // ログアウトさせる
        Auth::logout();

            // ログアウト後、リダイレクトなどの処理を行う
        return redirect('/')->with('success', '退会が完了しました。');
        }

        return redirect('/')->with('error', 'ユーザーが見つかりませんでした。');
}

}
