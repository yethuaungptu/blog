<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
</head>
<body>
<h1>Post Update</h1>
<form action="/posts/{{ $post->id }}" method="post">
    @method('PATCH')
    @csrf

    <label>Title</label>
    <input type="text" name="title" value="{{ $post->title }}"><p></p>
    <label>Content</label>
    <input type="text" name="content" value="{{ $post->content }}"><p></p>
    <label>Author</label>
    <input type="text" name="author" value="{{ $post->author }}"><p></p>
    <input type="submit" value="Add">
</form>
</body>
</html>
