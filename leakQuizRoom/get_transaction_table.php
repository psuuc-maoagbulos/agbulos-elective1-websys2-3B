<?php
if(isset($_POST['customer_id'])) {
    $customerId = $_POST['customer_id'];

    $conn = new mysqli("localhost", "root", "", "customer");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT rr.Transno, rr.reserve_no, rr.RoomName, c.Customer_Name, r.Price, rr.Date
    FROM reserve_room rr
    JOIN reservation res ON rr.reserve_no = res.reserve_no
    JOIN customer c ON res.Customer_ID = c.Customer_ID
    JOIN room r ON rr.RoomName = r.RoomName
    WHERE c.Customer_ID = $customerId";


    $result = $conn->query($query);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['Transno']}</td>";
            echo "<td>{$row['reserve_no']}</td>";
            echo "<td>{$row['RoomName']}</td>";
            echo "<td>{$row['Price']}</td>";
            echo "<td>{$row['Date']}</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No transactions found for the selected customer</td></tr>";
    }

    $conn->close();
} else {
    echo "Invalid request";
}
?>
