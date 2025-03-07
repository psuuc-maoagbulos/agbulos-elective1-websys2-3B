<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="userdash.css">
<body>
      <div class="container mt-5">
        <h2>Contact Us</h2>
        <p>If you have any questions or feedback, feel free to reach out to us.</p>

        <!-- Contact form using Bootstrap styles -->
        <form action="contactsubmit.php" method="post">
          <div class="form-group">
            <?php
            session_start();
require '../connection.php';
if(isset($_SESSION['username'])){
  $username=$_SESSION['username'];
  $stmt="select * from account where username ='$username'";
  $container=$conn->query($stmt);
  while($data=$container->fetch_assoc()){

           ?>

            <label for="contactName">Your Username</label>
            <input type="text" class="form-control" id="contactName" value="<?php echo $data['username'] ?>" name="name" readonly>
          </div>

          <div class="form-group">
            <label for="contactEmail">Your Email</label>
            <input type="email" class="form-control" id="contactEmail" value="<?php echo $data['email'] ?>" name="email" readonly>
          </div>
<?php   }

}  ?>
          <div class="form-group">
            <label for="contactMessage">Message</label>
            <textarea class="form-control" id="contactMessage" rows="5" placeholder="Enter your message" name="message"></textarea>
          </div>
          <hr>

<!-- Email and Facebook links -->
<p>For further assistance, you can also contact us via email or Facebook:</p>
<ul>
  <li>Email: <a href="mailto:gjeric54321@gmail.com">info@example.com</a></li>
  <li>Facebook: <a href="https://www.facebook.com/groups/227049364011004/" target="_blank">Visit our Facebook Page</a></li>
</ul>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="userdash.js"></script>
</body>
</html>