
<?php
session_start();
if (!isset($_SESSION['username'])) {
  // Redirect to the login page
  header("Location: ../user_registration/login.php");
  exit(); // Make sure to exit after sending the header to prevent further execution
} else {
  $username = $_SESSION['username'];
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Recipe</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="userdash.css">
    <style>
      
        select,input,textarea{
            border-color: orangered !important;
        }
        #usercircle:hover{
  cursor: pointer;
}
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-top" >
    <a class="navbar-brand" href="#">
      <span class="logo-text">FlavorFusion</span>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a  href="userdashboard.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="sharepage.php" class="nav-link">Share Recipe</a>
        </li>
        <li class="nav-item">
          <a href="favoritespage.php" class="nav-link" >Favorites</a>
        </li>
        <li class="nav-item">
          <a href="searchrecipeworld.php"  class="nav-link">Search Recipe World Wide</a>
        </li>
      
      </ul>
      <ul class="navbar-nav ml-auto" id="usercircle">
        <li class="nav-item dropdown">
          <div style=" background: rgb(250,176,123);
background: radial-gradient(circle, rgba(250,176,123,1) 0%, rgba(249,215,185,1) 100%) !important; /* Set the background color */
        border-radius: 50%; /* Ensure it's a circle */
        width: 50px; /* Set the width of the user image */
        height: 50px; /* Set the height of the user image */
        padding: 10px; " class="user-circle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            // You can replace 'path/to/user-image.jpg' with the actual path to the user's image
            $userImage = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPKf7bdPa_aOiwGzeNO4YY4YwvAya-Hy8vOUtOFkfi1SD3HDDhjCz7Ux6OqLKNiD3SIxM&usqp=CAU';
            if (file_exists($userImage)) {
              echo '<img src="' . $userImage . '" alt="User Image" class="user-image">';
            } else {
              echo '<span class="user-details text-white small">' . $username . '</span>';
            }
            ?>
          </div>
          <div class="dropdown-menu" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="mypost.php">My Post</a>
            <a class="dropdown-item" href="contactui.php">Contact us</a>
            <a class="dropdown-item" href="report.php ">Reports a post</a>
            <button class="btn btn-link text-dark ml-3" data-toggle="modal" data-target="#logoutModal">
             Logout
              </button>  
          </div>
        </li>


      </ul>

      <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <button class="btn btn-danger logout-btn"><a class="logout" href="logout.php">Logout</a></button>
            </li>
        </ul> -->
    </div>

  </nav>
      <div class="container w-100 mt-5 mb-3 p-4" style="background-color: #ffffff; border-radius: 12px;">
        <h1 class="text-center mb-4 p-2">Upload Your Recipe!</h1>
        <hr>
        <form action="sharerecipe.php" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="recipeImage">Image</label>
            <div class="dropzone" id="dropzone">
              <img id="previewImage" src="" alt="Preview Image" style="display: none;">
              <p>Drag & Drop an image or click to select</p>
              <input type="file" class="form-control-file" id="recipeImage" style="display: none;" name="img">
            </div>
          </div>

          <div class="form-group">
            <label for="recipeName">Name of the Recipe</label>
            <input type="text" class="form-control" id="recipeName" placeholder="Enter recipe name" name="rname">
          </div>

          <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea class="form-control" id="ingredients" rows="5" placeholder="Enter ingredients" name="ingredients"></textarea>
          </div>

          <div class="form-group">
            <label for="preparations">Preparations</label>
            <textarea class="form-control" id="preparations" rows="5" placeholder="Enter preparations" name="prepare"></textarea>
          </div>

          <div class="form-group">
            <label for="cookingInstructions">Cooking Instructions</label>
            <textarea class="form-control" id="cookingInstructions" rows="5" placeholder="Enter cooking instructions" name="instruct"></textarea>
          </div>
          <div class="form-group">
            <label for="recipeCategory">Category</label>
            <select class="form-control" id="recipeCategory" placeholder="Select category" name="cat">
              <option value="Breakfast">Breakfast</option>
              <option value="Lunch">Lunch</option>
              <option value="Dinner">Dinner</option>
              <!-- Add more categories as needed -->
            </select>
          </div>

          <input type="submit" class="btn btn-primary btn-block mb-3" name="share" value="Share">
        </form>
      </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="userdash.js"></script>
  <!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="logout.php" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>