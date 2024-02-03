<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
     // ログイン画面の表示
     public function showLoginForm()
     {
         return view('auth.login');
     }
 
     // ログイン処理
     public function login(Request $request)
     {
         $credentials = $request->only('email', 'password');
 
         if (Auth::attempt($credentials)) {
             // ログイン成功時の処理
             return redirect('/home');
         } else {
             // ログイン失敗時の処理
             return redirect()->back()->withErrors(['email' => '認証に失敗しました。']);
         }
     }
 
     // ログアウト処理
     public function logout()
     {
         Auth::logout();
         return redirect('/');
     }
}
