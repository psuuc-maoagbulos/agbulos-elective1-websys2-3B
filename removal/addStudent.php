<?php
include("config.php");

// Retrieve form data
$name = $_POST['name'];
$contactNumber = $_POST['contactNumber'];
$yearLevel = $_POST['yearLevel'];
$section = $_POST['section'];
$email = $_POST['email'];
$mark = $_POST['mark'];

// Insert data into the database
$query = "INSERT INTO studentInfo (name, contactNumber, yearLevel, section, email) VALUES ('$name', '$contactNumber', '$yearLevel', '$section', '$email')";
$conn->query($query);

$studentID = $conn->insert_id;

$query = "INSERT INTO grade (studentID, mark) VALUES ('$studentID', '$mark')";
$conn->query($query);

$conn->close();
?>