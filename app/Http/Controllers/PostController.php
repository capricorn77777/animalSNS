<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function showTimeline()
    {
        $posts = Post::all();
        return view('posts.timeline', compact('posts'));
    }
    public function showPost($id)
    {
        $post = Post::with('comments')->find($id);
        return view('posts.show', compact('post'));
    }

     // 投稿画面の表示
     public function create()
     {
         return view('posts.create');
     }
 
     // 投稿処理
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'content' => 'required',
         ]);

             // ユーザーに紐づく最初の動物を取得
        $user = auth()->user();
        $animal = $user->animals->first();

 
         $post = Post::create([
             'user_id' => auth()->user()->id,
             'animal_id' => $animal->id, // 動物のIDを使用
             'content' => $validatedData['content'],
         ]);
 
         return redirect('/home');
     }
}
