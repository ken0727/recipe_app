<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile',compact('user'));
    }

    private function uploadImage(Request $request)
    {
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/profile_images', $filename);
            Auth::user()->update(['image_path' => 'profile_images/' . $filename]);
        }
    }


public function update(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore(Auth::id()),
            ],
            'current_password' => 'nullable|string|min:2',
            'new_password' => 'nullable|string|min:2|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ユーザー情報の更新
        Auth::user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 他のプロフィール情報に対する更新も必要に応じて追加
        ]);

        $this->uploadImage($request);

    
        // パスワードの更新
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('password');

        if (!empty($currentPassword) && !empty($newPassword)) {
            // 現在のパスワードが一致するか確認
            if (Hash::check($currentPassword, Auth::user()->password)) {
                // 新しいパスワードをハッシュ化して保存
                Auth::user()->update(['password' => Hash::make($newPassword)]);
            } else {
                // エラー処理（現在のパスワードが一致しない場合）
                return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
            }
        }
        return redirect()->route('profile.show')->with('success', 'プロフィールが更新されました。');
    }
}
