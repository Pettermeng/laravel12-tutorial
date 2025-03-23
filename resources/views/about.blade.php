<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About</title>
    </head>
    <body>
        <h4>Current Page: {{$currentPage}}</h4>
        <h1> <?php echo $title ?></h1>
        <p>{{ $description }}</p>

        @if ($isShow)
            @foreach ($userInfo as $user)
                <p>{{$user}}</p>
            @endforeach
        @else
            <p>User not found!</p>
        @endif

        <form action="/submit-data" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" id="">
            <input type="submit" value="submit">
        </form>

    </body>
</html>
