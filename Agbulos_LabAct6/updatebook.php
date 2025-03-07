<?php

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    if (isset($_POST['bookid'], $_POST['isbn'], $_POST['title'], $_POST['classification'], $_POST['publisher'])) {
        $bookId = $_POST['bookid'];
        $isbn = $_POST['isbn'];
        $title = $_POST['title'];
        $classification = $_POST['classification'];
        $publisher = $_POST['publisher'];

        // Perform the update query
        $sql = "UPDATE bookinfo SET isbn = '$isbn', title = '$title', classification = '$classification', publisher = '$publisher' WHERE bookid = $bookId";

        if ($conn->query($sql) === TRUE) {
            
            echo 'success';
        } else {
            
            echo 'error';
        }
    } else {
       
        echo 'error';
    }
} else {
    
    echo 'error';
}

$conn->close();
?>
