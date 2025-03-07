<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Displa Input</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: darkblue;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
        }

        .result span {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>RESULT</h2>

        <div class="result">
            <p>Name: <span><?php echo htmlspecialchars($_POST['name']); ?></span></p>
            <p>Email: <span><?php echo htmlspecialchars($_POST['email']); ?></span></p>
            <p>Age: <span><?php echo htmlspecialchars($_POST['age']); ?></span></p>
        </div>
    </div>

</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = ""; // Your database password
$dbname = "UserFormDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($ageErr)) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = !empty($_POST["age"]) ? $_POST["age"] : NULL;

    $stmt = $conn->prepare("INSERT INTO users (name, email, age) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $email, $age);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

