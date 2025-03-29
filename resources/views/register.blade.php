<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
    </head>
    <body>
        @if (session(key: 'message'))
            <p>{{session(key: 'message')}}</p>
        @endif
        <form action="/submit-register" method="post">
            @csrf
            <input type="text" name="name"> <br>
            <input type="text" name="email"> <br>
            <input type="password" name="password"> <br>
            <input type="submit" value="submit">
        </form>
    </body>
</html>
