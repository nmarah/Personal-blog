<!DOCTYPE html>
<html>
    <head>
        <title>New Comment Added</title>
    </head>
    <body>
        <h1>New Comment Added</h1>
        <p>A new comment has been added to your blog.</p>
        <p>Article: {{ $comment->article->title }}</p>
        <p>Name: {{ $comment->name }}</p>
        <p>Email: {{ $comment->email }}</p>
        <p>Comment: {{ $comment->body }}</p>
    </body>
</html>
