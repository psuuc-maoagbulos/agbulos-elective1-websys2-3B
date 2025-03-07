<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }

        .card {
            border: 2px solid #e44d26; /* Orange border */
            border-radius: 10px; /* Rounded corners */
        }

        .card-header {
            background-color: #e44d26; /* Orange background */
            color: #fff; /* White text */
            border-bottom: 0; /* Remove default border */
            border-top-left-radius: 10px; /* Adjust border radius */
            border-top-right-radius: 10px; /* Adjust border radius */
        }

        .form-control,
        .btn {
            border-radius: 5px; /* Rounded corners for form elements and buttons */
        }

        .btn-orange {
            background-color: #e44d26; /* Orange background */
            color: #fff; /* White text */
        }

        .btn-orange:hover {
            background-color: #d6370d; /* Darker shade on hover */
        }

        .input-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="resetpass.php" method="post">
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="new_password" name="newpassword" required>
                                    <div class="password-toggle" onclick="togglePassword('new_password')">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirm_password" name="confirmpassword" required>
                                    <div class="password-toggle" onclick="togglePassword('confirm_password')">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-orange btn-block" value="Change Password" name="reset">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
require '../connection.php';
session_start();

if (isset($_POST['reset'])) {
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $newpass = $_POST['newpassword'];
        $confirmpass = $_POST['confirmpassword'];

        $isValid = true;
        if (strlen($newpass) < 8 || !preg_match('/[A-Z]/', $newpass)) {
            echo "<script>    Swal.fire({
                title: 'Password Requirements',
                text: 'Password must be at least 8 characters long and contain at least one uppercase letter.',
                icon: 'error'
            });</script>";

            $isValid = false; // Set validity to false
        }

        if ($isValid) {
            if ($newpass == $confirmpass) {
                $hashedPassword = password_hash($newpass, PASSWORD_BCRYPT);
                $insertQuery = "update account set password=? where email =?";
                $stmt = $conn->prepare($insertQuery);
                $stmt->bind_param("ss", $hashedPassword, $email);
                if ($stmt->execute()) {
                    // Move the header function here
                    header("Refresh:2;url=login.php");
                    echo "<script>    Swal.fire({
                        title: 'Success',
                        text: 'Password reset successfully',
                        icon: 'success'
                    });</script>";
                    session_destroy();
                } else {
                    echo "<script>    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while changing your password',
                        icon: 'error'
                    });</script>";
                }
            } else {
                echo "<script>    Swal.fire({
                    title: 'Error',
                    text: 'Passwords do not match',
                    icon: 'error'
                });</script>";
            }
        }
    }
}
?>

    <script>
        function togglePassword(inputId) {
            var input = document.getElementById(inputId);
            var eyeIcon = document.querySelector('#' + inputId + ' + .password-toggle i');

            if (input.type === "password") {
                input.type = "text";
                eyeIcon.className = 'fa fa-eye-slash';
            } else {
                input.type = "password";
                eyeIcon.className = 'fa fa-eye';
            }
        }
    </script>
</body>

</html>
