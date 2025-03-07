<?php
session_start();
include('db.php');

header('Content-Type: application/json'); // Set content type as JSON

$response = array('success' => false, 'message' => 'Reservation not added.');

if (isset($_POST['reserveNo']) && isset($_POST['reserveDate']) && isset($_POST['roomName']) && isset($_SESSION['custID'])) {
    $reserveNo = $_POST['reserveNo'];
    $reserveDate = $_POST['reserveDate'];
    $roomName = $_POST['roomName'];
    $custID = $_SESSION['custID'];

    // Insert into reservation_room table
    $queryReservationRoom = "INSERT INTO reservationroom (reserve_no, roomName, date) VALUES ('$reserveNo', '$roomName', '$reserveDate')";
    $resultReservationRoom = mysqli_query($conn, $queryReservationRoom);

    // Insert into reservation table
    $queryReservation = "INSERT INTO reservation (reserve_no, Reserve_d8, custID) VALUES ('$reserveNo', '$reserveDate', '$custID')";
    $resultReservation = mysqli_query($conn, $queryReservation);

    if ($resultReservationRoom && $resultReservation) {
        $response['success'] = true;
        $response['message'] = 'Reservation added successfully.';
    } else {
        $response['message'] = 'Query failed: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
}

echo json_encode($response);
?>
