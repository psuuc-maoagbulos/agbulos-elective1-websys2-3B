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

require '../connection.php'; // Assuming you've included your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if any of the required fields is empty
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
        echo "<script>
            Swal.fire({
                title: '',
                text: 'All fields are required to be filled.',
                icon: 'error'
            });
        </script>";
        header("Refresh:1;url=contactui.php");
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Prepare and execute the SQL query
        $insertQuery = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
        $container = $conn->prepare($insertQuery);
        $container->bind_param("sss", $name, $email, $message);

        if ($container->execute()) {
            echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Your message has been sent successfully.',
                    icon: 'success'
                }).then(function () {
                    openTab('contact-tab');
                });
            </script>";
            header("Refresh:1;url=contactui.php");
        } else {
            echo 'Error executing query: ' . $conn->error;
        }
    }
} else {
    // Request method is not POST
    // Your alternative logic here
}
?>


</body>
</html>