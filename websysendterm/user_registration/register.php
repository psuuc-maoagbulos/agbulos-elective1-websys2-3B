<?php
// Start a session if needed
// session_start();

require '../connection.php';

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword'])) {
    $username = trim($_POST['username']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $adminuser = "adminjerico";
    $adminpass = "admin123";

    $isValid = true;

    // Check if the username is already taken or if it's the admin username
    $checkUsernameQueryUser = "SELECT username FROM account WHERE username = ?";
    $stmtUser = $conn->prepare($checkUsernameQueryUser);
    $stmtUser->bind_param("s", $username);
    $stmtUser->execute();
    $resultUser = $stmtUser->get_result();

    $checkUsernameQueryAdmin = "SELECT username FROM adminaccount WHERE username = ?";
    $stmtAdmin = $conn->prepare($checkUsernameQueryAdmin);
    $stmtAdmin->bind_param("s", $username);
    $stmtAdmin->execute();
    $resultAdmin = $stmtAdmin->get_result();

    $checkEmail = "SELECT username FROM account WHERE email = ?";
    $stmtEmail = $conn->prepare($checkEmail);
    $stmtEmail->bind_param("s", $email);
    $stmtEmail->execute();
    $resultEmail = $stmtEmail->get_result();
    // Username validation using regular expression
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $response = [
            'title' => 'Invalid Username',
            'text' => 'Username can only contain alphanumeric characters and underscores.',
            'icon' => 'error'
        ];
        $isValid = false;
    }
    if ($resultUser->num_rows > 0 || $resultAdmin->num_rows > 0 || $username == $adminuser) {
        // Username is already taken or it's the admin username
        $response = [
            'title' => 'Username Already Taken',
            'text' => 'This username is already registered or not allowed. Please choose a different username.',
            'icon' => 'error'
        ];
        $isValid = false;
    }
    if ($resultEmail->num_rows>0) {
        // Email is already taken
        $response = [
            'title' => 'Email Already Taken',
            'text' => 'This email is already registered or not allowed. Please choose a different email.',
            'icon' => 'error'
        ];
        $isValid = false;
    }

    if ($isValid) {
        // Validate other fields and proceed with registration
        if ($username == "" || $password == "" || $email == "" || $confirmpassword == "") {
            $response = [
                'title' => '',
                'text' => 'Please fill up the form',
                'icon' => 'error'
            ];
            $isValid = false;
        } else {
            // Password validation
            if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password)) {
                $response = [
                    'title' => 'Password Requirements',
                    'text' => 'Password must be at least 8 characters long and contain at least one uppercase letter.',
                    'icon' => 'error'
                ];
                $isValid = false;
            }

        
        }
    }

    if ($isValid) {
        // Check if passwords match
        if ($password === $confirmpassword) {
            // Encrypt the password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insert the data into the appropriate table
            if ($username == $adminuser) {
                // Insert into admin_account table
                $insertQuery = "INSERT INTO admin_account (username, email, password) VALUES (?, ?, ?)";
            } else {
                // Insert into account table
                $insertQuery = "INSERT INTO account (username, email, password) VALUES (?, ?, ?)";
            }

            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                // Registration successful
                $response = [
                    'title' => 'Registration Successful',
                    'text' => 'Your account has been registered successfully!',
                    'icon' => 'success'
                ];
            } else {
                // Registration failed
                $response = [
                    'title' => 'Registration Failed',
                    'text' => 'An error occurred while registering your account.',
                    'icon' => 'error'
                ];
            }
        } else {
            // Passwords don't match
            $response = [
                'title' => 'Password Mismatch',
                'text' => 'Please make sure your passwords match.',
                'icon' => 'error'
            ];
        }
    }

    // Send the response as JSON
    echo json_encode($response);
} else {
    $response = [
        'title' => '',
        'text' => 'Invalid request',
        'icon' => 'error'
    ];
    echo json_encode($response);
}
?>
