<?php
session_start();
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT id, user_level FROM USER_ACCOUNT WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $user_level);

        if (mysqli_stmt_fetch($stmt)) {
            $_SESSION['user'] = $username;

            if ($user_level == 0 || $user_level == 1) {
                header("Refresh:2;url=home.php");
            }
        } else {
            header("Refresh:2;url=error.php");
        }

        mysqli_stmt_close($stmt);
    } else {
        // Handle the error if the statement preparation fails
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">username: </label>
        <input type="text" name="username" id="">
        <label for="">password: </label>
        <input type="text" name="password" id="">
        <input type="submit" value="Login" name="submit">
    </form>
    <?php


?>
</body>
</html>