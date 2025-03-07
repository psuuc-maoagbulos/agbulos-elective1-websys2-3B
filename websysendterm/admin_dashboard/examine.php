<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Recipe Management</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            font-family: 'Poppins', sans-serif;
            color: #495057;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #343a40; /* Dark gray background */
            padding: 15px;
            text-align: center;
            color: white;
            border-bottom: 1px solid #495057;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .blog-post {
            background-color: #ffffff; /* White background */
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .blog-post h3 {
            margin-top: 0;
            color: #e65100; /* Orange text */
        }

        .blog-post .category {
            color: #e65100; /* Orange text */
            font-weight: bold;
        }

        .blog-post .dateposted {
            color: #888;
            font-style: italic;
        }

        .blog-post img {
            max-width: 100%;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .blog-post p {
            color: #495057; /* Dark text */
        }

        .delete-btn {
            background-color: #d9534f; /* Red background color for delete button */
            color: #fff; /* White text color */
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-link {
            color: #fff; /* White text color for the back link */
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }
    </style>
</head>

<body>

    <header>
        <h1>Admin Recipe Management</h1>
        <a href="admin.php" class="back-link">Back to Admin Dashboard</a>
    </header>

    <section class="bg-white d-flex align-items-center min-vh-100">
        <div class="container mt-5">
            <?php
            session_start();
            require '../connection.php';

            if (isset($_GET['username'])) {
                $username = $_GET['username'];
                $stmt = "SELECT * FROM recipes natural join account where username='$username' order by timeshared desc";
                $container = $conn->query($stmt);

                if ($container->num_rows > 0) {
                    while ($row = $container->fetch_assoc()) {
                        ?>
                        <div class="blog-post">
                            <h3><?php echo $row['recipe_name'] ?></h3>
                            <p class="category"><strong>Category:</strong> <?php echo $row['category'] ?></p>
                            <p class="dateposted"><strong>Time Shared:</strong> <?php echo $row['timeshared'] ?></p>
                            <img src="../recipeimage/<?php echo $row['image_path'] ?>" alt="Recipe Image" class="img-fluid rounded">
                            <p><strong>Ingredients:</strong> <?php echo $row['ingredients'] ?></p><br>
                            <p><strong>Preparations:</strong> <?php echo $row['preparations'] ?></p><br>
                            <p><strong>Cooking Instructions:</strong> <?php echo $row['cooking_instructions'] ?></p>
                            <br>
                            <!-- Button to trigger modal -->
                            <button class="delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id']; ?>">
                                Delete Recipe
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this recipe?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="deleterecipe.php" method="post">
                                                <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                                <input type="hidden" value="<?php echo $username; ?>" name="user">
                                                <button type="submit" class="btn btn-danger" name="del">Delete Recipe</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                } else {
                    echo "<h1 class='text-center'>No recipes have been shared by $username</h1>";
                }
            } else {
                echo "<h1 class='text-center'>Please provide a username to view recipes</h1>";
            }
            ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
