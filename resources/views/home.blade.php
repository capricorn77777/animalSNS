<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Timeline</h1>
    @auth
        <!-- ログインユーザーの場合 -->
        <a href="{{ route('posts.create') }}">投稿する</a>
    @else
        <!-- 未ログインユーザーの場合 -->
        <a href="{{ route('login') }}">ログイン</a>
        <a href="{{ route('register') }}">登録</a>
    @endauth

    <ul>
        @foreach($posts as $post)
            <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->content }}</a></li>
        @endforeach
    </ul>
@endsection