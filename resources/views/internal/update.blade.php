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
<h1>Customer Update</h1>
<form action="{{ url('/customer/update') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $customer->id }}">
    <label>Name</label>
    <input type="text" name="name" value="{{ $customer->name }}"><p></p>
    <label>Email</label>
    <input type="email" name="email" value="{{ $customer->email }}"><p></p>
    <label>Password</label>
    <input type="password" name="password" value="{{ $customer->password }}"><p></p>
    <input type="submit" value="Add">
</form>
</body>
</html>
