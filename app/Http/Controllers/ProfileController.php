<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        ];

        // バリデーション実行
        $validator = Validator::make($request->all(), $rules);

        // バリデーションエラーがあればリダイレクト
        if ($validator->fails()) {
            return redirect()->route('profile.edit')->withErrors($validator)->withInput();
        }

        // ユーザー情報の更新
        $user = Auth::user();
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 他のユーザー情報に対する更新も必要に応じて追加
        ]);

        // 更新が成功したらリダイレクト
        return redirect()->route('profile.show')->with('success', 'プロフィールが更新されました。');
    }
}
