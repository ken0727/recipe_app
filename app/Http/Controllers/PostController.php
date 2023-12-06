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
    $user = Auth::user(); 
    return view('posts.show', compact('post', 'user'));
}
// 画像保存処理を行うメソッド
private function saveImage($post, $image)
{
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $image->storeAs('public/images', $filename);
    // 画像のファイル名をimage_pathに保存
    $post->image_path = 'images/' . $filename;
    $post->save();
}

// storeメソッド
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
        $this->saveImage($post, $request->file('image_path'));
    } else {
        // 画像が添付されていない場合、Noimage.jpegを設定
        $post->image_path = 'Noimage.jpeg';
        $post->save();
    }

    return redirect()->route('user.index', ['user_id' => $userId])->with('success', '投稿が作成されました。');
}

// updateメソッド
public function update(Request $request, Post $post)
{
    $request->validate([
        'name' => 'required|max:255',
        'material' => 'required',
        'procedure' => 'required',
        // 他にも必要なバリデーションルールを追加
    ]);

    $post->update([
        'name' => $request->name,
        'material' => $request->material,
        'procedure' => $request->procedure,
        // 他にもアップデートするフィールドがあればここに追加
    ]);

    // 画像がアップロードされていれば保存
    if ($request->hasFile('image_path')) {
        $this->saveImage($post, $request->file('image_path'));
    }

    return redirect()->route('my-page.show', $post);
}

    public function edit(Post $post)
{
    return view('posts.edit', compact('post'));
}

public function destroy(Post $post)
{
    // ログインしているかどうかを確認
    if (!auth()->check()) {
        // ログインしていない場合の処理（例えばログインページにリダイレクトなど）
        return redirect()->route('login');
    }

    // ログインユーザーが投稿者であるか、または管理者であるかを確認
    if (auth()->id() === $post->user_id || auth()->user()->isAdmin()) {
        // ここで投稿を削除する
        $post->delete();

        return redirect()->route('my-page.show')->with('success', '投稿が削除されました。');
    }

    return redirect()->back()->with('error', '権限がありません。');
}




}