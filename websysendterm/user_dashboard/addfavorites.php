<?php
session_start();
if (!isset($_SESSION['username'])) {
  // Redirect to the login page
  header("Location: ../user_registration/login.php");
  exit(); // Make sure to exit after sending the header to prevent further execution
} else {
  $username = $_SESSION['username'];
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <?php 
    require '../connection.php';

    if (isset($_GET['idofrecipe'])) {
        $IdofRecipe = $_GET['idofrecipe'];
        $username = $_SESSION['username'];

        // Check if the recipe is already in favorites
        $checkQuery = "SELECT * FROM favorites WHERE id = ? AND username = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("is", $IdofRecipe, $username);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            echo "<script>
            Swal.fire({
                title: '',
                text: 'This recipe is already in favorites.',
                icon: 'error'
            });
        </script>";
            header("Refresh:1;url=userdashboard.php");
        } else {
            // Add the recipe to favorites
            $insertQuery = "INSERT INTO favorites (id, username,timeshared) VALUES (?, ?,NOW())";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("is", $IdofRecipe, $username);

            if ($insertStmt->execute()) {

                echo "<script>
                Swal.fire({
                    title: '',
                    text: 'Added to favorites.',
                    icon: 'success'
                });
            </script>";                header("Refresh:1;url=userdashboard.php");
            } else {
                echo '<script>alert("Error adding to favorites.");</script>';
            }

        }

    }
    ?>
</body>
</html>
