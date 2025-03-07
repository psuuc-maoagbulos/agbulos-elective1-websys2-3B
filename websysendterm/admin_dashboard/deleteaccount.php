<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
<?php
require '../connection.php';
require '../admin_dashboard/phpmailer/Exception.php';
require '../admin_dashboard/phpmailer/PHPMailer.php';
require '../admin_dashboard/phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get user details before deletion
    $getUserDetails = "SELECT * FROM account WHERE accountid = $id";
    $userResult = $conn->query($getUserDetails);
    $userData = $userResult->fetch_assoc();

    // Delete the account
    $stmt = "DELETE FROM account WHERE accountid = $id";
    $container = $conn->query($stmt);

    if ($container) {
        // Notify user via email
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'jgarcia_21ur0151@psu.edu.ph';  // SMTP username
            $mail->Password = '@jerico123*';  // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS
            $mail->Port = 587;  // SMTP port

            // Email content
            $mail->setFrom('your_username@gmail.com', 'FlavorFusion');
            $mail->addAddress($userData['email']);  // User's email
            $mail->isHTML(true);
            $mail->Subject = 'Account Deletion Notification';
            $mail->Body = 'Dear ' . $userData['username'] . ',<br>Your account has been deleted due violating our policy If you believe this is an error, please contact support.<br>Thank you.';

            // Send email
            $mail->send();

            // Display success message
            echo "<script>    
                Swal.fire({
                    title: 'Account Deletion',
                    text: 'The account has been successfully deleted.',
                    icon: 'success'
                });
            </script>";
            header("Refresh:2;url=admin.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        // Display error message
        echo "<script>    
            Swal.fire({
                title: 'Account Deletion',
                text: 'Failed to delete the account.',
                icon: 'error'
            });
        </script>";
    }
}
?>
</body>
</html>
