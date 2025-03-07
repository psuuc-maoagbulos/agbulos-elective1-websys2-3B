<?php
session_start();
echo "Invalid credentials";
echo "<br>";
header("Refresh:2;url=login.php");
?>