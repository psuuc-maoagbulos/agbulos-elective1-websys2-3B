<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

</head>
<body>
    <?php
  session_start();
    require '../connection.php';
    if(isset($_GET['favoriteID'])){
        $username=$_SESSION['username'];
        $favoriteID=$_GET['favoriteID'];
        $stmt="DELETE favorites
        FROM favorites
        INNER JOIN account ON favorites.username = account.username
        WHERE favorites.id =$favoriteID AND favorites.username = '$username';
        ";
        $container=$conn->query($stmt);
        echo "<script>
        Swal.fire({
            title: '',
            text: 'Removed from favorites',
            icon: 'error'
        });
    </script>";
    header("Refresh:1;url=favoritespage.php");
    }
    
    ?>
</body>
</html>