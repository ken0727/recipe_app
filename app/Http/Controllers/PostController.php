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

    public function store(Request $request)
{
    
    
    $request->validate([
        'name' => 'required|string|max:255',
        'material' => 'required|string',
        'procedure' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    
    $post = new Post([
        'user_id' => $request->input('user_id'),
        'name' => $request->input('name'),
        'material' => $request->input('material'),
        'procedure' => $request->input('procedure'),
    ]);
    
    $post->save();

    // 画像がアップロードされていれば保存
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $filename);
        $post->image = $filename;
    }

    $post->save();

    return redirect('/posts')->with('success', '投稿が作成されました。');
}
}
