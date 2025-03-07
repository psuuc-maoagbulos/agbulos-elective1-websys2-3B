<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.25.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white cshadow box-are">
            <div
                class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #ff9100"
            >
                <div class="featured-image mb-3">
                    <img src="3.png" class="img-fluid" style="width: 250px" />
                </div>
                <p class="text-white fs-2" style="font-family: Arial, sans-serif; font-weight: 600;">
                    Be verified
                </p>
                <small class="text-white-wrap text-white text-center"
                    style="width: 17rem; font-family: Arial, sans-serif; font-size: medium;"
                >
                    Discover food recipes on this platform
                </small>
            </div>

            <div class="col-md-6">
                <form id="login-form">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Hello again!</h2>
                            <p>We are happy to have you back</p>
                        </div>
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                class="form-control form-control-lg bg-light fs-6"
                                placeholder="Username"
                                id="username"
                                name="username"
                                required
                            />
                        </div>
                        <div class="input-group mb-1">
                            <input
                                type="password"
                                id="password"
                                class="form-control form-control-lg bg-light fs-6"
                                placeholder="Password"
                                name="password"
                                autocomplete="off"
                                required
                            />
                            <div class="input-group-text">
                                <button type="button" id="togglePassword" class="btn btn-link">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">
                           
                            <div class="forgot">
                                <small><a href="./phpmailer/forgotpass.php">Forgot Password?</a></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input
                                class="btn btn-lg btn-warning w-100 fs-6"
                                type="button"
                                value="Login"
                                id="login"
                                name="login"
                            />
                        </div>
                       
                        <div class="row">
                            <small>Don't have an account? <a href="signup.php">Sign up</a></small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var passwordVisible = false;

            // Function to toggle password visibility
            function togglePasswordVisibility(input, icon) {
              if (passwordVisible) {
    input.attr("type", "password");
    icon.removeClass("fa-eye-slash");
    icon.addClass("fa-eye");
} else {
    input.attr("type", "text");
    icon.removeClass("fa-eye");
    icon.addClass("fa-eye-slash");
}

                passwordVisible = !passwordVisible;
            }

            // Toggle password visibility when the button is clicked
            $("#togglePassword").on("click", function() {
                var passwordInput = $("#password");
                var toggleIcon = $(this).find("i");

                togglePasswordVisibility(passwordInput, toggleIcon);
            });

            // Handle form submission
            $("#login").on("click", function() {
                // Get form data and proceed with AJAX submission
                var username = $("#username").val();
                var password = $("#password").val();

                // Create a data object to send to the server
                var data = {
                    username: username,
                    password: password
                };

                // Make an AJAX request to the server for form submission
                $.ajax({
                    type: "POST",
                    url: "login2.php",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // Handle the response from the server
                        Swal.fire({
                            title: response.title,
                            text: response.text,
                            icon: response.icon
                        });

                        if (response.icon === "success") {
                            // Clear input fields on successful login
                            $("#username").val("");
                            $("#password").val("");
                           setTimeout(() => {
                            window.location.href = "../user_dashboard/userdashboard.php";
                           }, 1500);


                        }
                        else if(response.icon==="info"){
                          $("#username").val("");
                            $("#password").val("");
                           setTimeout(() => {
                            window.location.href = "../admin_dashboard/admin.php";
                           }, 1500);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX errors if needed
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>
