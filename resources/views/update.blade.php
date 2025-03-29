<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
    </head>
    <body>
        <form action="/submit-update" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type="text" name="name" value="{{ $user->name }}"> <br>
            <input type="text" name="email" value="{{ $user->email }}"> <br>
            <input type="submit" value="submit">
        </form>
    </body>
</html>
