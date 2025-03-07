<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
</head>
<body>
    <form action="/create" method="post">
        @csrf
        <table>
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <input type="text" name="stud_name">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Add student">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
