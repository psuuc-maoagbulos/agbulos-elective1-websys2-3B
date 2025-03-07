<?php
// Include your database connection file here
include('db.php'); // Replace with the actual path to your database connection file

// Perform a query to get all room names from the database
// Replace the following with your actual database query
$query = "SELECT roomName FROM room";
$result = mysqli_query($conn, $query); // Use the correct variable for the database connection

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Fetch the result into an associative array
$roomNames = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Output room names as options for the dropdown
foreach ($roomNames as $room) {
    echo "<option value='{$room['roomName']}'>{$room['roomName']}</option>";
}

// Close the database connection
mysqli_close($conn);
?>
