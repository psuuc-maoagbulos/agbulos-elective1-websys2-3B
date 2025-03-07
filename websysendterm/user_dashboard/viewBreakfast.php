<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../user_registration/login.php");
  exit(); 
} else {
  $username = $_SESSION['username'];
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Cards</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="userdash.css">
    <style>
        body{
            background: rgb(254,217,149);
background: radial-gradient(circle, rgba(254,217,149,1) 0%, rgba(247,204,165,1) 100%);
        }
        .recipe-card {
            margin: 10px;
            flex: 0 0 calc(33.333% - 20px);
        }

        .recipe-img {
            max-width: 100%;
            height: auto;
        }

        .recipe-details {
            padding: 10px;
        }

        .recipe-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <section class="container-fluid w-100" id="sec">
           
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2>Breakfast Recipes</h2>
                            <p>Explore our delicious breakfast recipes and start your day with a delightful meal.</p>
                        </div>
                    </div>
                </div>
                <?php
                require '../connection.php';

                // Assuming you're getting the category value from a variable, replace 'Breakfast' with your variable
                $category = 'Breakfast';

                // Use prepared statements to prevent SQL injection
                $stmt = $conn->prepare("SELECT * FROM recipes WHERE category = ?");
                $stmt->bind_param("s", $category);
                $stmt->execute();

                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    // Your code to display each recipe goes here
                    echo '<div class="col-md-4">';
                    echo '<div class="card recipe-card">';
                    echo '<img src="../recipeimage/' . $row['image_path'] . '" alt="Recipe Image" class="card-img-top recipe-img">';
                    echo '<div class="card-body recipe-details">';
                    echo '<h5 class="card-title recipe-title">' . $row['recipe_name'] . '</h5>';
                    echo '<p class="card-text recipe-category">Category: ' . $row['category'] . '</p>';
                    echo '<a href="viewdetails.php?recipeID='.$row['id'].'" class="btn btn-primary">View Details</a>';
                    // Add more details as needed
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }

                $stmt->close();
                $conn->close();
                ?>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
