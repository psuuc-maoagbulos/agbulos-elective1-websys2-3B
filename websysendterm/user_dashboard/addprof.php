

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Upload</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<?php
session_start();
require '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION['username']) {
  $username=$_SESSION['username'];
  $Imagename = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
   if(move_uploaded_file($tmp_name,"../user_dashboard/profile/".$Imagename)){
$stmt="insert into userprofile(userimg,username) values('$Imagename','$username')";
$container=$conn->query($stmt);
echo "<script>
Swal.fire({
    title: 'Success!',
    text: 'Profile inserted successfully!',
    icon: 'success',
});
</script>";
header("Refresh:2;url=mypost.php");
   }
}
?>

</body>
</html>
