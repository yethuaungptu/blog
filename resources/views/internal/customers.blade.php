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
    <h1>Customer list</h1>
    <table>
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td><a href="/customer/{{ $customer->id }}">{{ $customer->name }}</a></td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->password }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
