<?php
// Include your database connection file here
include('db.php'); // Replace with the actual path to your database connection file

$response = array('success' => false, 'message' => 'Reservation not added.');

if (isset($_POST['reserve_no']) && isset($_POST['Date']) && isset($_POST['roomName'])) {
    $reserve_no = $_POST['reserve_no'];
    $Date = $_POST['Date'];
    $roomName = $_POST['roomName'];


    // Perform a query to add the reservation to the database
    $query = "INSERT INTO reservationroom (reserve_no, roomName, date) VALUES ('$reserve_no', '$roomName', '$Date')";
    $result = mysqli_query($conn, $query); // Use the correct variable for the database connection

    if ($result) {
        $response['success'] = true;
        $response['message'] = 'Reservation added successfully.';
    } else {
        $response['message'] = 'Query failed: ' . mysqli_error($conn);
    }
   
} else {
    $response['message'] = 'Missing required parameters.';
}

echo json_encode($response); 
mysqli_close($conn);
?>