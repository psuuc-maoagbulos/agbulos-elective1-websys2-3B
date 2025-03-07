<?php
$customerId = $_POST['customer_id'];

$conn = new mysqli("localhost", "root", "", "customer");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM Customer WHERE Customer_ID = $customerId");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Customer ID: {$row['Customer_ID']}<br>";
    echo "Customer Name: {$row['Customer_Name']}";
} else {
    echo "No customer found";
}

$conn->close();
?>
