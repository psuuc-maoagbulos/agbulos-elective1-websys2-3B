<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PHP Validation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgray;
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
        }

        h2 {
            text-align: center;
            color: black;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid gray;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: darkblue;
            color: white;
            cursor: pointer;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: navy;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .success {
            color: green;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>
<body>

    <?php
    // Define variables and set to empty values
    $name = $email = $age = "";
    $nameErr = $emailErr = $ageErr = "";
    $successMessage = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate Name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = $_POST["name"];
        }

        // Validate Email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // Validate Age 
        if (!empty($_POST["age"])) {
            $age = $_POST["age"];
            if (!is_numeric($age)) {
                $ageErr = "Age must be a number";
            }
        }

        // If no errors, show success message
        if (empty($nameErr) && empty($emailErr) && empty($ageErr)) {
            $successMessage = "Form submitted successfully!";
        }
    }
    ?>

    <div class="container">
        <h2>Simple PHP Form</h2>
        <form method="post" action="display.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <span class="error">* <?php echo $nameErr;?></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
                <span class="error">* <?php echo $emailErr;?></span>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" name="age" value="<?php echo $age; ?>">
                <span class="error"><?php echo $ageErr;?></span>
            </div>

            <input type="submit" name="submit" value="Submit">
        </form>

       
        <?php
        if (!empty($successMessage)) {
            echo "<p class='success'>$successMessage</p>";
        }
        ?>
    </div>

</body>
</html>
