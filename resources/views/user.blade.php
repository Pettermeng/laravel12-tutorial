<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User</title>
    </head>
    <body>

        @if (session('message-update'))
            <p>{{session('message-update')}}</p>
        @endif

        @if (session('message-delete'))
            <p>{{session('message-delete')}}</p>
        @endif

        <table border="1px" width="500px">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="/user-detail/{{$user->id}}">Detail</a>
                        <a href="/update/{{$user->id}}">Edit</a>
                        <a href="/delete/{{$user->id}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
