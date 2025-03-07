<?php
session_start();
require '../connection.php';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="userdash.css">
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: #e0e0e0; /* Light gray background color */
            margin: 0;
            padding: 0;
        }

        .card-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 20px;
        }

        .card {
            width: 250px;
            background-color: #FFD700; /* Lighter orange color for background */
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            margin: 15px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-header {
            background-color: #FF8C00; /* Darker orange for header */
            color: #fff;
            border-bottom: none;
            border-radius: 10px 10px 0 0;
            text-align: center;
            font-size: 18px;
            padding: 15px;
        }

        .card-body {
            color: #333;
            padding: 15px;
            text-align: center;
        }

        .card-footer {
            background-color: #FF8C00; /* Darker orange for footer */
            color: #fff;
            border-top: none;
            border-radius: 0 0 10px 10px;
            text-align: center;
            padding: 12px;
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
        }

        /* Additional Styles for "My Own Recipes" Section */
        .my-recipes-section {
            background-color: #FFA500; /* Orange color for the section */
            padding: 20px;
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }
        .profile-card {
      padding: 20px;
      background-color: #FFECDA;
      border-radius: 10px;
    }

    .profile-card img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 20px;
    }

    form {
      margin-bottom: 20px;
    }

    form input[type="file"] {
      border: none;
      outline: none;
    }

    form button {
      display: block;
      margin: 0 auto;
      background-color: #28a745; /* Green color for the button */
      color: #fff;
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .my-recipes-section {
        background-color: #FFA500; /* Orange color for the section */
        padding: 20px;
        text-align: center;
        color: #fff;
        margin-bottom: 20px;
    }

    .my-recipes-section a {
        color: #fff; /* Text color for the link */
        text-decoration: none; /* Remove underline */
        font-size: 18px; /* Adjust font size */
        margin-right: 10px; /* Add margin for spacing */
    }

    .my-recipes-section a:hover {
        text-decoration: underline; /* Underline on hover */
    }

    </style>
</head>

<body>
    <div class="my-recipes-section">
        <h2>My Own Recipes</h2>
        <a href="userdashboard.php">Back to homepage</a>
    </div>
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
       
      </div>
    </div>
  </div>
    <div class="card-container">
        <?php
            if(isset($_SESSION['username'])){
                $username=$_SESSION['username'];
                require '../connection.php';
                $stmt = "SELECT * FROM recipes NATURAL JOIN account WHERE username='$username' ORDER BY timeshared DESC";
                $container=$conn->query($stmt);
                while($data=$container->fetch_assoc()){
        ?>
        <div class="card">
            <img src="../recipeimage/<?php echo $data['image_path'] ?>" alt="Recipe Image">
            <div class="card-header">
                <?php echo $data['recipe_name'] ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $data['category'] ?></p>
            </div>
            <div class="card-footer">
                <i><p class="card-text"><?php echo $data['timeshared'] ?></p></i>
                <!-- Button to trigger modal -->
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $data['id']; ?>">Delete Post</button>
            </div>
        </div>
<!-- Delete Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this post?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="delete_mypost.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

       
        <?php
                }
            }
        ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
