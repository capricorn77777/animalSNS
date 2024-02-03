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
            <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->content}}</a></li>
        @endforeach
    </ul>
</body>
</html>
