<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/injectitem')}}" method="POST" enctype=multipart/form-data>
        @csrf
        <input type="file" name="filekita">
        <input type="file" name="filekita2">
        <input type="submit">
    </form>
</body>
</html>