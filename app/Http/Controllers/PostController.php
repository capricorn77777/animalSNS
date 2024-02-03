<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function showPost($id)
    {
        $post = Post::with('comments')->find($id);
        return view('posts.show', compact('post'));
    }
}
