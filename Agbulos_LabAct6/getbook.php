<?php
require 'config.php';

$sql = "SELECT * FROM bookinfo order by bookid desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $books = array();
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }

    
    echo json_encode($books);
} else {
    
    echo json_encode(array());
}

$conn->close();
?>
