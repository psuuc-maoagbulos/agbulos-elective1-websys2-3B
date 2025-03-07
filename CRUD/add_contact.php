<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $sex = $_POST['sex'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];

    // Handle image upload
    $image_path = 'images/';
    $image_name = basename($_FILES['picture']['name']);
    $image_path .= $image_name;

    if (move_uploaded_file($_FILES['picture']['tmp_name'], $image_path)) {
        // Insert contact into the database
        $query = "INSERT INTO contacts (firstname, lastname, address, sex, mobile_number, email, picture_path) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssss", $firstname, $lastname, $address, $sex, $mobile_number, $email, $image_path);
        if ($stmt->execute()) {
            header('Location: index.php');
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Image upload failed.";
    }
}
?>

<!-- HTML Form for Adding a Contact -->

