<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $classification = $_POST['classification'];
    $publisher = $_POST['publisher'];


    
    if ($isbn == "" || $title == "" || $classification == "" || $publisher == "") {
        echo 'error_empty_fields';
    } else {
       
        $sql = "INSERT INTO BookInfo (isbn, title, classification, publisher) VALUES ('$isbn', '$title', '$classification', '$publisher')";

        
        if ($conn->query($sql) === TRUE) {
            echo 'success'; 
        } else {
            echo 'error_database'; 
        }
    }
}

$conn->close();
?>
