<?php


require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['bookid'])) {
        $bookId = $_POST['bookid'];

        
        $sql = "DELETE FROM bookinfo WHERE bookid = $bookId";
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
