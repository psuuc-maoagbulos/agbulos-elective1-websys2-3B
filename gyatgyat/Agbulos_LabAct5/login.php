<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5)), url('blog.jpg') center/cover fixed no-repeat;
            color: black;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.7); /* Slightly transparent white */
            border: 1px solid #dddfe2;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center">Login</h2>

        <?php
            include('database.php');
            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);

                // Validate input
                if (empty($username) || empty($password)) {
                    // Handle empty username or password
                    echo "<div class='alert alert-danger' role='alert'>Username and password are required.</div>";
                } else {
                    // Perform authentication
                    $query = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
                    $result = $conn->query($query);

                    if ($result->num_rows == 1) {
                        // Authentication successful
                        $row = $result->fetch_assoc();
                        $_SESSION['user_id'] = $row['id'];
                        header("Location: index.php");
                        exit();
                    } else {
                        // Authentication failed
                        echo "<div class='alert alert-danger' role='alert'>Invalid username or password.</div>";
                    }
                }
            }
        ?>

        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="mt-3 text-center">Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
