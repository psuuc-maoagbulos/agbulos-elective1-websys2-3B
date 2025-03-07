<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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



if(isset($_POST['del'])){
    $id=$_POST['id'];
    $user=$_POST['user'];

    // Get user email
    $getEmail = "SELECT email FROM account WHERE username='$user'";
    $emailResult = $conn->query($getEmail);
    $emailRow = $emailResult->fetch_assoc();
    $userEmail = $emailRow['email'];

    // Delete the recipe
    $stmt = "DELETE FROM recipes WHERE id=$id";
    $container = $conn->query($stmt);

    if ($container) {
        // Email notification
        $mail = new PHPMailer(true);

        try {
            //Server settings
        // Set up the SMTP server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'jgarcia_21ur0151@psu.edu.ph';  // SMTP username
        $mail->Password = '@jerico123*';  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS
        $mail->Port = 587;  // SMTP port
    
        $mail->setFrom('jgarcia_21ur0151@psu.edu.ph', 'Flavor Fusion');

            //Recipients
                $mail->addAddress($userEmail); // User's email
            
          

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Post Deletion Notification by Flavor Fusion';
            $mail->Body = 'Your post has been deleted by Flavor Fusion due to a violation of site rules. by Flavor Fusion';
            

            $mail->send();

            echo "<script>    
                Swal.fire({
                    title: '',
                    text: 'The recipe has been deleted, and the user has been notified via email.',
                    icon: 'success'
                });
            </script>";
            header("Refresh:2;examine.php?username=$user");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>    
            Swal.fire({
                title: '',
                text: 'Failed to delete the recipe.',
                icon: 'error'
            });
        </script>";
    }
}
?>
</body>
</html>
