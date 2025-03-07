<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission for editing a contact
    // Update contact details in the database
}

// Retrieve contact information based on ID and pre-fill the form fields
$contact_id = $_GET['id'];
$query = "SELECT * FROM contacts WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $contact_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header('Location: error.php');
    exit;
}

$contact = $result->fetch_assoc();
?>

<!-- HTML Form for Editing a Contact -->

