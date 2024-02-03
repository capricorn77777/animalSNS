<!-- resources/views/posts/create.blade.php -->

<form method="POST" action="{{ route('posts.store') }}">
    @csrf

   

    <label for="content">Content:</label>
    <textarea name="content" required></textarea>

    <button type="submit">Post</button>
</form>
