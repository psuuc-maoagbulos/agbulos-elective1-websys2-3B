<?php
session_start();
if (!isset($_SESSION['username'])) {
  // Redirect to the login page
  header("Location: ../user_registration/login.php");
  exit(); // Make sure to exit after sending the header to prevent further execution
} else {
  $username = $_SESSION['username'];
}

require '../connection.php';

$stmt = "SELECT *
FROM favorites
INNER JOIN recipes ON favorites.id = recipes.id
INNER JOIN account ON favorites.username = account.username
WHERE favorites.username = '$username'
ORDER BY favorites.timeshared DESC;";
$container = $conn->query($stmt);

// Check if there are no favorites found
$noFavorites = $container->num_rows === 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Favorites</title>

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="userdash.css">

  <style>
    body {
      background: rgb(254, 217, 149);
      background: radial-gradient(circle, rgba(254, 217, 149, 1) 0%, rgba(247, 204, 165, 1) 100%);
    }

    #usercircle:hover {
      cursor: pointer;
    }
    .card {
    height: 400px; /* Adjust the height as needed */
  }

  /* Maintain aspect ratio for the image inside the card */
  .card img {
    object-fit: cover;
    height: 60%; /* Adjust the percentage as needed */
    border-radius: 10px 10px 0 0;
  }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light sticky-">
    <a class="navbar-brand" href="#">
      <span class="logo-text">FlavorFusion</span>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a href="userdashboard.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="sharepage.php" class="nav-link">Share Recipe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Favorites</a>
        </li>
        <li class="nav-item">
          <a href="searchrecipeworld.php" class="nav-link">Search RecipeWorldWide</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto" id="usercircle">
        <li class="nav-item dropdown">
          <div style="  background: rgb(250, 176, 123);
                        background: radial-gradient(circle, rgba(250, 176, 123, 1) 0%, rgba(249, 215, 185, 1) 100%) !important;
                        border-radius: 50%;
                        width: 50px;
                        height: 50px;
                        padding: 10px;" class="user-circle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <button class="btn btn-link text-dark ml-3.5" data-toggle="modal" data-target="#logoutModal">
             Logout
              </button>        </div>
        </li>
      </ul>
    </div>
  </nav>

  <section class="container-fluid p-5">
    <?php if ($noFavorites) : ?>
      <!-- Display a message when no favorites are found -->
      <div class="alert alert-warning" role="alert">
        You have no favorites yet.
      </div>
    <?php else : ?>
      <!-- Display favorites when they are found -->
      <div class="row" id="recipeContainer">
        <?php
        while ($row = $container->fetch_assoc()) {
          echo '<div class="col-md-4 mb-4">';
          echo '<div class="card h-80">';
          echo '<img src="../recipeimage/' . $row['image_path'] . '" class="card-img-top" alt="Recipe Image" height="100px">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title recipe-name-' . $row['id'] . ' font-weight-bold">' . $row['recipe_name'] . '</h5>';
          echo '<p class="card-text">';
          echo '<span class="font-weight-bold">Category:</span> ' . $row['category'];
          echo '<br>';
          echo '<span class="font-weight-bold">Shared by:</span> ' . $row['username'];
          echo '</p>';
          echo '<a href="viewdetails.php?recipeID=' . $row['id'] . '" class="btn btn-primary">View Details</a>';
          // echo ' <a style="color: red;           
          //               text-decoration: none; " href="deletefavorite.php?favoriteID=' . $row["id"] . '">
          //               <i class="fas fa-trash"></i> Remove
          //             </a>';
          echo '<a style="position: absolute; top: 10px; right: 10px; font-size: 24px; color:red; text-decoration: none;"  href="deletefavorite.php?favoriteID=' . $row["id"] . '" class="favorite-button"><i class="fas fa-heart heart-icon"></i></a>';
          
          // Generate JavaScript code to dynamically add this recipe to the container
          echo '<script>';
          echo 'var recipe = {';
          echo 'id: ' . $row['id'] . ',';
          echo 'recipe_name: "' . $row['recipe_name'] . '",';
          echo 'category: "' . $row['category'] . '",';
          echo 'username: "' . $row['username'] . '",';
          echo '};';
          echo '</script>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    <?php endif; ?>
  </section>

  <!-- Bootstrap JS and dependencies -->
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
