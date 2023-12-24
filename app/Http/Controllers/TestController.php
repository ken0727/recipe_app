<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\BookmarkRecipe;
use App\Models\Post; 
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {

        $postNames = Post::pluck('name'); // 例として、全ての投稿の名前を取得

        return view('test.index', compact('postNames'));
    }

    public function search(Request $request)
    {
        
        $searchKeyword = $request->input('search');
        $searchType = $request->input('search_type', 'all'); // デフォルトは全投稿
        
        switch ($searchType) {
            
            case 'user':
                // 自分の投稿から検索
                $posts = auth()->user()->posts()->where('name', 'like', '%' . $searchKeyword . '%')->get();
                break;
            
            case 'bookmarked':
                // ブックマークした投稿から検索
                
                $posts = auth()->user()->bookmark_recipes()->where('name', 'like', '%' . $searchKeyword . '%')->get();
                break;

            default:
                // 全投稿から検索
                $posts = Post::where('name', 'like', '%' . $searchKeyword . '%')->get();
                break;
        }

        return view('test.search_results', ['posts' => $posts]);
    }
}
    


