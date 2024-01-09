<?php

namespace App\Http\Controllers;

use App\Models\User; // User モデルを読み込む
use App\Models\Post; // Post モデルを読み込む
use App\Models\Like; // Like モデルを読み込む
use Illuminate\Http\Request;


class IndexController extends Controller
{
public function show($user_id)
{
    // 特定のユーザーの投稿一覧を取得
    $user = User::find($user_id);
    
    // ユーザーが存在するか確認
    if ($user) {
        $allPosts = $user->posts; // リレーションを通じてユーザーの投稿を取得
        return view('index.show', compact('allPosts', 'user'));
    } else {
        // ユーザーが存在しない場合の処理
        echo "投稿がありません";
    }
}

public function ranking()
{
    $rankingPosts = Post::getRanking();

    return view('index.ranking', ['rankingPosts' => $rankingPosts]);
    
}

}
