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
     
            <div>
                <!-- プロフィール画像 -->
                @if ($post->user->profile_image_url)
                    <img src="{{ $post->user->profile_image_url }}" alt="プロフィール画像">
                @else
                    <img src="{{ asset('images/1707116115.png') }}" alt="プロフィール画像">
                @endif

                <!-- 動物の種族名 -->
                @if ($post->animal)
                    <span>{{ $post->animal->species }}</span>
                @else
                    <span>代替テキスト</span>
                @endif
            </div>
        @endforeach

      
    </ul>
@endsection