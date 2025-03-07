<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login Page</title>
</head>
<style>
    body {
            background: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5)), url('bg.jpg') center/cover fixed no-repeat;
            color: black;
        }

</style>
<body> 
<div class="container-lg mt-5"> <!-- Use container-lg class for a larger container -->
    <div class="row justify-content-center">
        <div class="col-md-8"> <!-- Adjusted the column size for better proportion -->
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Blog Entry</h1>
                </div>
                <div class="card-body">
                    <form id="loginForm">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="login()">Login</button>
                    </form>
                    <div class="mt-3">
                        <p>Don't have an account? <a href="#" data-toggle="modal" data-target="#registerModal">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Registration form here -->
                <form id="registerForm">
                    <div class="form-group">
                        <label for="newUsername">New Username</label>
                        <input type="text" class="form-control" id="newUsername" name="newUsername" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="register()">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function login() {
        // Add your login logic here
        alert('Login functionality to be implemented.');
    }

    function register() {
        // Add your registration logic here
        alert('Registration functionality to be implemented.');
    }
</script>

</body>
</html>
