<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find your account</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f2f2f2;
        }

        .password-reset-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #e44d26; /* Orange border */
        }

        .password-reset-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #e44d26; /* Orange text color */
        }

        .form-control,
        .btn {
            border-radius: 5px;
        }

        .btn-orange {
            background-color: #e44d26; /* Orange background color */
            color: #fff; /* White text color */
        }

        .btn-orange:hover {
            background-color: #d6370d; /* Darker shade on hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="password-reset-container">
                    <h2>Forgot Password</h2>
                    <form action="forgotpassfunctionality.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <button type="submit" class="btn btn-orange w-100" name="forgot">Reset Password</button>
                    </form>
                    <div class="mt-3">
                        <a href="../login.php" style="color: #e44d26;">Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
