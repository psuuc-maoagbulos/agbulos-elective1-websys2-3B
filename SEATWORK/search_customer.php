<?php
// Include your database connection file here
include('db.php'); // Replace with the actual path to your database connection file

// Start or resume a session
session_start();

if (isset($_POST['customerName'])) {
    $customerName = $_POST['customerName'];

    // Perform a query to check if the customer exists in the database
    // Replace the following with your actual database query
    $query = "SELECT * FROM customer WHERE Name = '$customerName'";
    
    // Execute the query and fetch the result
    $result = mysqli_query($conn, $query); // Use the correct variable for the database connection

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $customer = mysqli_fetch_assoc($result);

    if ($customer) {
        // Set CustID in session
        $_SESSION['custID'] = $customer['CustID'];

        // Display customer information
        echo "Customer ID: {$customer['CustID']}, Name: {$customer['Name']}";
    } else {
        // Customer not found
        echo "No customer found.";
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>
