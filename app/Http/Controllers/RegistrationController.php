<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Animal;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        //
        // ユーザーの登録
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // 動物の登録
        $animal = new Animal([
            'name' => $request->input('animal_name'),
            'species' => $request->input('species'),
            'gender' => $request->input('gender'),
            'birthday' => $request->input('birthday'),
        ]);

        $user->animals()->save($animal);

        // 登録後のリダイレクト先やメッセージを設定
        return redirect('/home'); // '/home'は実際のリダイレクト先に合わせて変更してください
    }
}
