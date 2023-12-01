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
        return view('profile');
    }

    public function update(Request $request)
    {
        // バリデーションルールの定義
        $rules = [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore(Auth::id()), // 自分自身の email は重複しても良いように ignore しています
            ],
            'current_password' => 'nullable|string|min:8',
            'password' => 'nullable|string|min:8|confirmed',
        ];

        // バリデーション実行
        $validator = Validator::make($request->all(), $rules);

        // バリデーションエラーがあればリダイレクト

        if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInput();
}

        // ユーザー情報の更新
        $user = Auth::user();
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 他のユーザー情報に対する更新も必要に応じて追加
        ]);

        // パスワードの更新
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('password');

        if (!empty($currentPassword) && !empty($newPassword)) {
            // 現在のパスワードが一致するか確認
            if (Hash::check($currentPassword, $user->password)) {
                // 新しいパスワードをハッシュ化して保存
                $user->password = Hash::make($newPassword);
                $user->save();
            } else {
                // エラー処理（現在のパスワードが一致しない場合）
                return redirect()->route('profile.edit')->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
            }
        }

        // 更新が成功したらリダイレクト
        return redirect()->route('profile.show')->with('success', 'プロフィールが更新されました。');
    }
}
