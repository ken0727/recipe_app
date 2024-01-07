<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\BookmarkRecipe;
use App\Models\Post; 
use Illuminate\Http\Request;

class SearchController extends Controller
{


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
            $user = auth()->user();
            $bookmarkedPostIds = $user->bookmarkRecipes()->pluck('post_id');
            $posts = Post::whereIn('id', $bookmarkedPostIds)
                ->where('name', 'like', '%' . $searchKeyword . '%')
                ->get();
            break;

            default:
                // 全投稿から検索
                $posts = Post::where('name', 'like', '%' . $searchKeyword . '%')->get();
            break;
        }

        return view('test.search_results', ['posts' => $posts, 'searchKeyword' => $searchKeyword]);
    }

    
}

