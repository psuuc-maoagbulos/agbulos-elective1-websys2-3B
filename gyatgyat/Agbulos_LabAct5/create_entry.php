<?php
include('database.php');
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blog_title = mysqli_real_escape_string($conn, $_POST['blog_title']);
    $blog_content = mysqli_real_escape_string($conn, $_POST['blog_content']);
    $blog_cat = mysqli_real_escape_string($conn, $_POST['blog_cat']);

    // Get the user ID from the session
    $userId = $_SESSION['user_id'];

    $blog_pic = null;
    if ($_FILES['blog_pic']['error'] == 0) {
        $blog_pic = $_FILES['blog_pic']['name'];
        move_uploaded_file($_FILES['blog_pic']['tmp_name'], 'uploads/' . $blog_pic);
    }

    $query = "INSERT INTO post(user_id, blog_title, blog_content, blog_cat, blog_pic) VALUES ($userId, '$blog_title', '$blog_content', '$blog_cat', '$blog_pic')";
    $conn->query($query);

    
    echo '<script>
            var isConfirmed = confirm("Blog entry created successfully. Do you want to go back to the home page?");
            if (isConfirmed) {
                window.location.href = "index.php";
            }
          </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Blog Entry</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: antiquewhite;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        header {
            background-color:cornflowerblue;
            color: #ffffff;
            padding: 15px 0;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 15px;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        button {
            background-color: #1da1f2;
            color: #ffffff;
        }

        button:hover {
            background-color: #0c7cbf;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Blog Entry</h1>
            <nav>
                <ul class="nav justify-content-end">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="create_entry.php">Create Blog Entry</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mt-4">
        <form action="create_entry.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="blog_title">Title:</label>
                <input type="text" name="blog_title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="blog_content">Content:</label>
                <textarea name="blog_content" class="form-control" rows="6" required></textarea>
            </div>

            <div class="form-group">
                <label for="blog_cat">Category:</label>
                <select name="blog_cat" class="form-control" required>
                    <option value="Entertainment">Entertainment</option>
                    <option value="Technology">Technology</option>
                    <option value="Travel">Travel</option>
                    <option value="Food">Food</option>
                </select>
            </div>

            <div class="form-group">
                <label for="blog_pic">Image:</label>
                <input type="file" name="blog_pic" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
</body>
</html>
