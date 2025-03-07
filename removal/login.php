<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Student Database</h1> <br>
    <form action="" method="POST">
    Username <input type="text" name="user"> <br>
    Password <input type="password" name="pwd"> <br>
    <input type="submit" value="login" name="log">
    </form>
    <?php
    session_start();
    if(isset($_POST['log'])){
    $user=$_POST['user'];
    $pwd=$_POST['pwd'];
$ruser="";
$rpwd="";
    require 'config.php';
  
    $stmt ="SELECT * FROM account where username='$user' and password='$pwd'";

    $container=$conn->query($stmt) or die("Could not perform $stmt");
   while($data=$container->fetch_assoc()){
       $ruser= $data['username'];
       $rpwd= $data['password'];
    
   }
   if($user==$ruser && $pwd==$rpwd){
    $_SESSION['username']=$user;
    $_SESSION['password']=$pwd;
    header("Location:index.html");
 
}else {
    header("Refresh:2;url=error.php");   
}

   
}
    ?>
</body>
</html>