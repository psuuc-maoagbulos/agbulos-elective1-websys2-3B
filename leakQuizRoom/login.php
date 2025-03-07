<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="ui.php">
        Username: <input type="text" name="user"><br>
        Password: <input type="text" name="pwd"><br>
        <input type="submit" value="login" name="log">
    </form>

<?php
session_start();
if(isset($_POST['log'])){
$user=$_POST['user'];
$pwd=$_POST['pwd'];
$ruser="";
$rpwd="";

require 'conn.php';
$sql="SELECT*FROM account where username='$user' and password='$pwd'";

$container=$conn->query($sql) or die ('Failed $sql');
while($data=$container->fetch_assoc()){
    $ruser=$data['username'];
    $rpwd=$data['password'];
    
}
if($user==$ruser && $pwd==$rpwd){
    $_SESSION['username']=$user;
    $_SESSION['password']=$pwd;
    header('Location:ui.php');
}else{
    echo('mali haha');
}

}
?>
</body>
</html>