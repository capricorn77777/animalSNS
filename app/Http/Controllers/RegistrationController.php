<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Animal;
use Illuminate\Support\Facades\Storage; // 追加
use Illuminate\Support\Facades\File;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        //dd($request->file('profile_image'));
        //
        // ユーザーの登録
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

         // プロフィール画像を保存
    // 保存先のディレクトリを作成
if (!File::exists(public_path('profile_images'))) {
    File::makeDirectory(public_path('profile_images'), $mode = 0777, true, true);
}
         
            $profileImage = $request->file('profile_image');
            $imagePath = Storage::putFile('profile_images', $profileImage, 'public');
         

         
        // 動物の登録
        $animal = new Animal([
            'name' => $request->input('animal_name'),
            'species' => $request->input('species'),
            'gender' => $request->input('gender'),
            'birthday' => $request->input('birthday'),
            'profile_image' => $imagePath ?? null, // プロフィール画像のパスを保存
        ]);

        $user->animals()->save($animal);

        // 登録後のリダイレクト先やメッセージを設定
        return redirect('/home'); // '/home'は実際のリダイレクト先に合わせて変更してください
    }
}
