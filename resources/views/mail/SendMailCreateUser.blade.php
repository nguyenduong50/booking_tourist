<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị máy tính</title>
</head>
<body>
    <h1>Welcome New Telesale</h1>
    <p>We have created a new account for you</p>
    <p>Email: {{$user->email}}</p>
    <a href="{{url('/')}}/verify?token={{$user->remember_token}}&email={{$user->email}}">Kích hoạt</a>
</body>
</html>