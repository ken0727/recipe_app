<?php

// LikeController.php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function toggleLike($postId)
    {
        $user = Auth::user();
        $like = Like::where('user_id', $user->id)->where('post_id', $postId)->first();

        if ($like) {
            // いいねがすでに存在する場合は削除
            $like->delete();
            return redirect()->back()->with('success', 'いいねを解除しました');
        } else {
            // いいねが存在しない場合は追加
            $like = new Like();
            $like->user_id = $user->id;
            $like->post_id = $postId;
            $like->save();
        }

        return redirect()->back()->with('success', 'いいねしました');
    }
}
