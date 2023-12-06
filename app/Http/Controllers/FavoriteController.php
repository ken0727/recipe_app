<?php

// app/Http/Controllers/FavoriteController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Request $request, User $user)
{

    $currentUserID = $request->input('current_user_id');
    $postUserID = $request->input('post_user_id');
    
    // すでにお気に入りしているか確認
    if (!Favorite::where('user_id', $currentUserID)->where('favorited_user_id', $postUserID)->exists()) {
        // お気に入りに追加
        
        Favorite::create([
            'user_id' => $currentUserID,
            'favorited_user_id' => $postUserID,
        ]);

        return back()->with('success', 'ユーザーをお気に入りに追加しました。');
    }

    return back()->with('error', 'このユーザーは登録済みです');
}

    // コントローラーのメソッド内で $user をビューに渡す
        public function show(User $user)
        {
            return view('users.show', compact('user'));
        }

        // FavoriteController.php

public function index()
{
    $user = auth()->user();
    $favoriteUsers = $user->favoriteUsers;

    return view('favorites.index', compact('favoriteUsers'));
}


}

