<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $option = isset($_POST['option']) ? $_POST['option'] : '';

    $con = new mysqli('localhost', 'root', '', 'form');

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    // Delete data if a delete button was clicked
    if (isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $deleteQuery = "DELETE FROM data WHERE id = $delete_id";
        if ($con->query($deleteQuery) === TRUE) {
            echo "Data with ID $delete_id has been deleted.";
        } else {
            echo "Error deleting data with ID $delete_id: " . $con->error;
        }
    }

    // Fetch existing data from the database
    $selectQuery = "SELECT * FROM data";
    $result = $con->query($selectQuery);

   
if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Email</th><th>Gender</th><th>Mobile</th><th>Password</th><th>Option</th><th>Action</th></tr>"; // Added an "Action" column
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['mobile']}</td>";
        echo "<td>{$row['password']}</td>";
        echo "<td>{$row['option']}</td>";
        // Add a delete button for each row
        echo "<td><form method='POST'><input type='hidden' name='delete_id' value='{$row['id']}'><input type='submit' value='Delete'></form></td>";

        echo "</tr>";
    }
    echo "</table>";
        $result->free();
    } else {
        echo "Error: " . $selectQuery . "<br>" . $con->error;
    }

    // Insert new data
    $insertQuery = "INSERT INTO data (name, email, gender, mobile, password, option) VALUES ('$name', '$email', '$gender', '$mobile', '$password', '$option')";
    
    if ($con->query($insertQuery) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $con->error;
    }

    $con->close();
}
?>
