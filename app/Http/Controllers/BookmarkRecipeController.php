<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class BookmarkRecipeController extends Controller
{
    public function bookmarkRecipe($postId)
    {
        $user = Auth::user();
        $post = Post::find($postId);

        if ($user && $post) {
            // ブックマークが既に存在するか確認
            if (!$user->bookmarkRecipes()->where('post_id', $postId)->exists()) {
                // ブックマークが存在しない場合は新しく作成
                $user->bookmarkRecipes()->create(['post_id' => $postId]);
                return redirect()->back()->with('success', 'ブックマークしました。');
            } else {
                // ブックマークが既に存在する場合は解除
                $user->bookmarkRecipes()->where('post_id', $postId)->delete();
                return redirect()->back()->with('success', 'ブックマークを解除しました。');
            }
        }

        return redirect()->back()->with('error', 'エラーが発生しました。');
    }

    public function unbookmarkRecipe($postId)
    {
        $user = Auth::user();
        $post = Post::find($postId);

        if ($user && $post) {
            // ブックマークが存在する場合は解除
            $user->bookmarkRecipes()->where('post_id', $postId)->delete();
            return redirect()->back()->with('success', 'ブックマークを解除しました。');
        }

        return redirect()->back()->with('error', 'エラーが発生しました。');
    }

public function index(Request $request)
{
    // ログインユーザーがブックマークしたレシピを常に取得
    $bookmarkedRecipes = Auth::user()->bookmarkRecipes;

    $searchKeyword = $request->input('search');

    // 検索ワードがある場合、検索を行う
    if ($searchKeyword) {
        $searchPosts = Post::with('user')
            ->where('name', 'like', '%' . $searchKeyword . '%')
            ->get();
        return view('bookmark_recipe.index', compact('bookmarkedRecipes', 'searchPosts'));
    } 
        
    // ブックマークされたレシピ一覧と検索結果のビューを表示
    return view('bookmark_recipe.index', compact('bookmarkedRecipes'));
}

}