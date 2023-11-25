<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post; // Post モデルを正しく参照

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function index()
{
    // 全ユーザーの投稿を取得
    $allPosts = Post::with('user')->get(); 

    
    return view('index.show', ['allPosts' => $allPosts]);
}

    public function show(Post $post)
{
    return view('posts.show', ['post' => $post]);
}

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'material' => 'required|string',
            'procedure' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $userId = Auth::id(); // ログインしているユーザーのIDを取得

        $post = new Post([
            'user_id' => $userId,
            'name' => $request->input('name'),
            'material' => $request->input('material'),
            'procedure' => $request->input('procedure'),
        ]);

        $post->save();

        // 画像がアップロードされていれば保存
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);
            // 画像のファイル名をimage_pathに保存
            $post->image_path = 'images/' . $filename;
            $post->save();
        }

        return redirect()->route('user.index', ['user_id' => $userId])->with('success', '投稿が作成されました。');
    }

}