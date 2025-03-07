<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <!-- Include SweetAlert CSS and JS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

    <?php 
    session_start();
    require '../connection.php';
    if(isset($_SESSION['username'])){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $stmt="delete from recipes where id=$id";
            $container=$conn->query($stmt);
            echo "<script>    Swal.fire({
                title: '',
                text: 'The recipe has been deleted.',
                icon: 'success'
            });</script>";
            header("Refresh:2;url=mypost.php?id=$id");
    ?>
            
        
    <?php
        }
    }
    ?>
</body>
</html>
