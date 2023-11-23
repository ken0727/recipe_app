<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show($user_id)
    {
        // ここでユーザーに関連するデータを取得し、ビューに渡すなどの処理を行う
        return view('index.show', ['user_id' => $user_id]);
    }
}
