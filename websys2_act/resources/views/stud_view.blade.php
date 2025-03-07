<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view student</title>
</head>
<body>
    <table border="1">
        <tr><td>
            Name
        </td>
    <td>
        ID
    </td></tr>
        @foreach ($users as $user)
        <tr>
            <td>
                {{$user->id}}
            </td>
            <td>{{$user->name}}</td>
            <td><a href='delete/{{$user->id}}'>Delete</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>