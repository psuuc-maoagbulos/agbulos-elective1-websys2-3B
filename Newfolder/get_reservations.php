<?php
// Include your database connection file here
include('db.php'); // Replace with the actual path to your database connection file

// Perform a query to get reservations with joined data from multiple tables
// Replace the following with your actual database query
$query = "SELECT rr.Transno, rr.reserve_no, rr.roomName, c.Name AS customerName, r.Price, rr.date AS reservationDate
          FROM reservationroom rr
          INNER JOIN room r ON rr.roomName = r.roomName
          INNER JOIN customer c ON rr.reserve_no = c.CustID";
$result = mysqli_query($conn, $query); // Use the correct variable for the database connection

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Fetch the result into an associative array
$reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Output reservations in the table format
if (!empty($reservations)) {
    foreach ($reservations as $reservation) {
        echo "<tr>";
        echo "<td>{$reservation['Transno']}</td>";
        echo "<td>{$reservation['reserve_no']}</td>";
        echo "<td>{$reservation['roomName']}</td>";
        echo "<td>{$reservation['customerName']}</td>";
        echo "<td>{$reservation['Price']}</td>";
        echo "<td>{$reservation['reservationDate']}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No reservations found</td></tr>";
}

// Close the database connection
mysqli_close($conn);
?>