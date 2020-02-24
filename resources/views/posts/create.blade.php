<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
    <style>
        div{
            color: red;
        }
    </style>
</head>
<body>
<h1>Post Add</h1>

<form action="{{ url('/posts') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Title</label>
    <input type="text" name="title">
    <div>
        {{ $errors->first('title') }}
    </div><p></p>
    <label>Content</label>
    <input type="text" name="content">
    <div>
        {{ $errors->first('content') }}
    </div><p></p>
    <label>Author</label>
    <select name="customer_id">
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
    </select>
    <div>
        {{ $errors->first('author') }}
    </div><p></p>
    <label for="">Image</label>
    <input type="file" name="image">
    <div>
        {{ $errors->first('image') }}
    </div><p></p>
    <input type="submit" value="Add">
</form>
</body>
</html>
