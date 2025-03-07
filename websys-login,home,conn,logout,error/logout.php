<?php session_start();
session_destroy();
echo "NAKA LOG OUT KANA INSAN";
header ("Refresh:2;url=index.php");
?>