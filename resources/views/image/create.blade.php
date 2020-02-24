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
<h1>Image Add</h1>

<form action="{{ url('/images') }}" method="POST" enctype="multipart/form-data">
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
    <label for="">Image</label>
    <input type="file" name="image">
    <div>
        {{ $errors->first('image') }}
    </div><p></p>
    <label for="">Image</label>
    <input type="file" name="image1">
    <div>
        {{ $errors->first('image1') }}
    </div><p></p>
    <label for="">Image</label>
    <input type="file" name="image2">
    <div>
        {{ $errors->first('image2') }}
    </div><p></p>
    <label for="">Image</label>
    <input type="file" name="image3">
    <div>
        {{ $errors->first('image3') }}
    </div><p></p>
    <label for="">Image</label>
    <input type="file" name="image4">
    <div>
        {{ $errors->first('image4') }}
    </div><p></p>
    <label for="">Image</label>
    <input type="file" name="image5">
    <div>
        {{ $errors->first('image5') }}
    </div><p></p>
    <label for="">Gallery</label>
    <input type="file" name="gallery[]" multiple>
    <div>
        {{ $errors->first('gallery') }}
    </div><p></p>
    <input type="submit" value="Add">
</form>
</body>
</html>
