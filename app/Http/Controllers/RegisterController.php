<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:2',
        ]);

        
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        dd($request);
        return redirect('/login')->with('success', '新規会員登録が完了しました。ログインしてください。');
    }

    public function uploadImage(Request $request)
{
    // ファイルのバリデーションなどを追加

    $uploadedImage = $request->file('image');
    $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
    $uploadedImage->storeAs('public/images', $imageName);

    // ファイルパスをデータベースに保存する処理
    // 例えば、Userモデルのimage_pathカラムに保存するなど
    $user = Auth::user();
    $user->image_path = 'images/' . $imageName;
    $user->save();

    return redirect()->back()->with('success', '画像がアップロードされました。');
}

}
