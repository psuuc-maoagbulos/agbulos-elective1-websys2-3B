<?php
session_start();
session_destroy();
echo "You have been logout";
header("Refresh:2;url=login.php");
?>