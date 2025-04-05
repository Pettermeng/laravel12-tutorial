<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('site-title')</title>
        <link rel="stylesheet" href="{{url('assets/css/theme.css')}}">
    </head>
    <body>
        <header>
            <h1>Header Component</h1>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <h3>Footer Component</h3>
        </footer>
    </body>
</html>
