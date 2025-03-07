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
    if(isset($_POST['addc'])){
        $recipeID=$_POST['recipeID'];
       $username=$_SESSION['username'];
       $comment=$_POST['comment'];
       $stmt = "INSERT INTO comment (id, username, comments, timecomment) VALUES ($recipeID, '$username', '$comment', NOW())";

       $container=$conn->query($stmt);
       echo "<script>
       Swal.fire({
           title: '',
           text: 'Comment added',
           icon: 'success'
       });
       </script>";
       header("Refresh:1;url=viewdetails.php?recipeID=$recipeID");
    }
   
    ?>
</body>
</html>