<?php
include('database.php');
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blogId = $_POST['blogID'];
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $userId = $_SESSION['user_id'];

    $query = "INSERT INTO comments (user_id, blogID, comment) VALUES ($userId, $blogId, '$comment')";
    $conn->query($query);
}

header("Location: index.php"); // Redirect back to the post
exit();
?>
