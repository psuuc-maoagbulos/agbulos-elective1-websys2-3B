<?php
session_start();
session_destroy();
echo "You have been logout";
header("Location:login.php");
?>