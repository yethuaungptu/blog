<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h1>Post list</h1>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> {{ session()->get('message') }}
</div>
@endif
    <table class="table table-bordered mt-5">
        <thead>
            <td>Title</td>
            <td>Content</td>
            <td>Customer Name</td>
            <td>Customer Email</td>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->customer->name }}</td>
                    <td>{{ $post->customer->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
<div class="row pt-4">
    <div class="d-flex just">
        {{ $posts->links() }}
    </div>
</div>
</div>
</body>
</html>
