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
<h1>Customer Detail</h1>
    Name: {{ $customer->name }}<br>
    Email: {{ $customer->email }}<br>
    Password: {{ $customer->password }}<br>
    <a href="/customer/edit/{{ $customer->id }}"> <button>Update</button> </a>
    <a href="/customer/destroy/{{ $customer->id }}"> <button>Delete</button> </a>
</body>
</html>
