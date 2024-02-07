<!-- resources/views/posts/timeline.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Timeline</title>
</head>
<body>
    <h1>Timeline</h1>
    <ul>
      
        @foreach($posts as $post)
            <div>
            <!-- プロフィール画像 -->
            @if ($post->user->profile_image_url)
                <img src="{{ $post->user->profile_image_url }}" alt="プロフィール画像">
            @else
                <img src="{{ asset('images/1707116115.png') }}" alt="代替画像" width="80px">
            @endif

            <!-- 動物の種族名 -->
            @if ($post->animal)
                <span>{{ $post->animal->species }}</span>
            @else
                <span>代替テキスト</span>
            @endif
            </div>
        
            <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->content}}</a></li>
        @endforeach
    </ul>
</body>
</html>
