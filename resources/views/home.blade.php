<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Timeline</h1>
        @auth
            <!-- ログインユーザーの場合 -->
            <div class="mb-4">
                <a class="btn btn-primary me-2" href="{{ route('posts.create') }}">投稿する</a>
                <a class="btn btn-secondary me-2" href="{{ route('profile.show', ['user' => Auth::id()]) }}">プロフィール</a>
                <a class="btn btn-info" href="{{ route('animals.edit', ['animal' => $user->animals->first()->id]) }}">animal</a>
            </div>
        @else
            <!-- 未ログインユーザーの場合 -->
            <div class="mb-4">
                <a class="btn btn-primary me-2" href="{{ route('login') }}">ログイン</a>
                <a class="btn btn-secondary" href="{{ route('register') }}">登録</a>
            </div>
        @endauth

        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item">
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->content }}</a>
                    
                    <!-- プロフィール画像 -->
                    <div class="mt-2">
                        @if ($post->user->profile_image_url)
                            <img src="{{ $post->user->profile_image_url }} " alt="プロフィール画像" class="rounded-circle me-2" width="40px">
                        @else
                            <img src="{{ asset('images/1707116115.png') }}" alt="プロフィール画像" class="rounded-circle me-2" width="40px">
                        @endif
                        
                        <!-- 動物の種族名 -->
                        @if ($post->animal)
                            <span class="badge bg-primary">{{ $post->animal->species }}</span>
                        @else
                            <span class="badge bg-secondary">代替テキスト</span>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
