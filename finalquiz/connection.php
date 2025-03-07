<?php
$dbuser = "root";
$dbpass = "";
$host = "localhost";
$db = "transaction";

$conn = new mysqli($host, $dbuser, $dbpass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
