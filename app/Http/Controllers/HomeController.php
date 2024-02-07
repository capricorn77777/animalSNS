<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 現在のログインユーザーを取得
        $user = Auth::user();

        // 現在のユーザーに関連する動物を取得
        $animals = $user->animals;

        $posts = Post::latest()->get(); // 例として最新の投稿を取得

        return view('home', compact('posts','animals','user'));
    }
}
