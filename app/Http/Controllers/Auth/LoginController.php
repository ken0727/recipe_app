<?php

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        // ログイン後の処理を追加する場合はここに追加
        // 例えば、リダイレクト先の指定など
        return redirect($user->dashboardPath());
    }
}
