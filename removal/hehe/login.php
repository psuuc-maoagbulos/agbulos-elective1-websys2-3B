<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <form method="POST" action=" ">
        Username: <input type="text" name="user" ><br>
        Password: <input type="password" name="pwd"><br>
        <input type="button" value="login" name="log" >
    </form>

    <?php
   session_start();
   if(isset($_POST['log'])){
    $user=$_POST['user'];
    $pwd=$_POST['pwd'];
    $ruser;
    $rpwd;

   require 'config.php';
   
   $sql="SELECT *FROM account where username='$user'  and password='$pwd'";

   $container=$conn->query($sql) or die ("Failed $sql");
   while($data=$container->fetch_assoc()){
    $ruser=$data['username'];
    $rpwd=$data['password'];
   }
   if($user==$ruser && $pwd==$rpwd){
    $_SESSION["username"]=$user;
    $_SESSION["password"]=$password;
    header('Location:index.html');
   }
   else{
    echo"Log in Failed";
   }
   }
    ?>
</body>
</html>