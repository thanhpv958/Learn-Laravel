<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('dangnhap') }}" method="POST">
    @csrf
    <input type="text" name="username" placeholder="User" >
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Dang nhap">
</form>
</body>
</html>