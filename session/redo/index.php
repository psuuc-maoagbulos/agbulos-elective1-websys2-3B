<?php
session_start();
if(isset($_SESSION['username'])){
 echo "Welcome   ".$_SESSION['username'];
 echo "<br>";
echo "<a href='logout.php'>Log out</a>";
}
else{
    header("Refresh:2;url=login.php");
}
?>