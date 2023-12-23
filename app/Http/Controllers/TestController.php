<?php

namespace App\Http\Controllers;

// app/Http/Controllers/TestController.php

use App\Models\Post; // Postモデルのネームスペースに合わせて修正
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        // 既存のコードと共存させるため、テストページ用のメソッドとして実装

        $postNames = Post::pluck('name'); // 例として、全ての投稿の名前を取得

        return view('test.index', compact('postNames'));
    }

    public function search(Request $request)
    {   
        $searchKeyword = $request->input('search');
        
        // 検索キーワードが空の場合は空のコレクションを返す
        if (!$searchKeyword) {
            $posts = collect();
        } else {
            // 検索キーワードがある場合は検索条件を適用
            $posts = Post::with('user')
                ->where('name', 'like', '%' . $searchKeyword . '%')
                ->get();
        }
            
        return view('test.search_results', ['posts' => $posts]);
    }

    

    
}

