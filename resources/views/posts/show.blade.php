<!-- resources/views/posts/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
   
</head>
<body>

    <p>{{ $post->content }}</p>

    <h2>Comments</h2>
    <ul>

        @foreach($post->comments as $comment)
            <li>{{ $comment->content }}</li>
        @endforeach
    </ul>
</body>
</html>
