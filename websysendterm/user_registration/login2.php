<?php
// Start the session
session_start();
require '../connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Declared admin credentials
    

    if ($username == "" || $password == "") {
        $response = [
            'title' => '',
            'text' => 'Please fill up the form',
            'icon' => 'error'
        ];
    } else {
        // Check if the username is in the admin table
        $stmtAdmin = "SELECT username, password FROM adminaccount WHERE username = ?";
        $stmtAdmin = $conn->prepare($stmtAdmin);
        $stmtAdmin->bind_param("s", $username);
        $stmtAdmin->execute();
        $resultAdmin = $stmtAdmin->get_result();

        if ($resultAdmin->num_rows === 1) {
            // Admin login
            $dataAdmin = $resultAdmin->fetch_assoc();
            $hashedPasswordAdmin = $dataAdmin['password'];

            if ($password == $hashedPasswordAdmin) {
                $_SESSION['admin'] = $username;
                $response = [
                    'title' => 'Admin Account',
                    'text' => 'Welcome admin',
                    'icon' => 'info'
                ];
            } else {
                $response = [
                    'title' => '',
                    'text' => 'Password is wrong',
                    'icon' => 'error'
                ];
            }
        } else {
            // Check if the username is in the user table
            $stmtUser = "SELECT username, password FROM account WHERE username = ?";
            $stmtUser = $conn->prepare($stmtUser);
            $stmtUser->bind_param("s", $username);
            $stmtUser->execute();
            $resultUser = $stmtUser->get_result();

            if ($resultUser->num_rows === 1) {
                // Regular user login
                $dataUser = $resultUser->fetch_assoc();
                $hashedPasswordUser = $dataUser['password'];

                if (password_verify($password, $hashedPasswordUser)) {
                    // Store the username in the session
                    $_SESSION['username'] = $username;

                    $response = [
                        'title' => 'User Account',
                        'text' => 'Welcome user',
                        'icon' => 'success'
                    ];
                } else {
                    $response = [
                        'title' => '',
                        'text' => 'Password is wrong',
                        'icon' => 'error'
                    ];
                }
            } else {
                $response = [
                    'title' => '',
                    'text' => 'Username is not registered',
                    'icon' => 'error'
                ];
            }
        }
    }

    // Return JSON response to the client
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
