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
    <!-- Include Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>
<body>
    <!-- Main Container -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100" style="width: 900%">
        <!-- Login container -->
        <div class="row border rounded-5 p-3 bg-white cshadow box-area">
            <!-- Left Box -->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #ff9100">
                <div class="featured-image mb-3">
                    <img src="3.png" class="img-fluid" style="width: 250px" />
                </div>
                <p class="text-white fs-2" style="font-family: Arial; font-weight: 600">Create account</p>
                <small class="text-white-wrap text-white text-center" style="width: 17rem; font-family: Arial; font-size: medium">Discover food recipes on this platform</small>
            </div>
            <!-- Right Box -->
            <div class="col-md-6">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Hello world!</h2>
                        <p>We are happy to have you</p>
                    </div>
                    <form id="signup-form">
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                class="form-control form-control-lg bg-light fs-6"
                                placeholder="Username"
                                id="username"
                                name="username"
                            />
                        </div>
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                class= "form-control form-control-lg bg-light fs-6"
                                placeholder="Email Address"
                                id="email"
                                name="email"
                            />
                        </div>
                        <div class="input-group mb-1">
                            <input
                                type="password"
                                class="form-control form-control-lg bg-light fs-6"
                                placeholder="Password"
                                id="password"
                                name="password"
                            />
                            <div class="input-group-text">
                                <button type="button" id="togglePassword" class="btn btn-link">
                                    <i class="fa fa-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                        </div>
                        <div class="input-group mb-1">
                            <input
                                type="password"
                                class="form-control form-control-lg bg-light fs-6"
                                placeholder="Confirm password"
                                id="confirmpassword"
                                name="confirmpassword"
                            />
                            <div class="input-group-text">
                                <button type="button" id="toggleConfirmPassword" class="btn btn-link">
                                    <i class="fa fa-eye" id="toggleConfirmIcon"></i>
                                </button>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input class="btn btn-lg btn-warning w-100 fs-6" type="button" name="sub" value="Create Account" id="create-account-button" />
                        </div>
                    </form>
                  
                    <div class="row">
                        <small>Already have an account? <a href="login.php">Login</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var passwordVisible = false;
            var confirmPasswordVisible = false;

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

            // Function to toggle confirm password visibility
            function toggleConfirmPasswordVisibility() {
                var confirmPasswordInput = $("#confirmpassword");
                var toggleConfirmIcon = $("#toggleConfirmIcon");

                togglePasswordVisibility(confirmPasswordInput, toggleConfirmIcon);
            }

            // Toggle password visibility when the button is clicked
            $("#togglePassword").on("click", function() {
                var passwordInput = $("#password");
                var toggleIcon = $("#toggleIcon");

                togglePasswordVisibility(passwordInput, toggleIcon);
            });

            // Toggle confirm password visibility when the button is clicked
            $("#toggleConfirmPassword").on("click", toggleConfirmPasswordVisibility);
// pag pass ng data sa dataabse
            // Handle form submission
            $("#create-account-button").on("click", function() {
                // Get form data and proceed with AJAX submission
                var username = $("#username").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var confirmpassword = $("#confirmpassword").val();

                // Create a data object to send to the server
                var data = {
                    username: username,
                    email: email,
                    password: password,
                    confirmpassword: confirmpassword
                };

                // Make an AJAX request to the server for form submission
                $.ajax({
                    type: "POST",
                    url: "register.php",
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
                            // Clear input fields on successful registration
                            $("#username").val("");
                            $("#email").val("");
                            $("#password").val("");
                            $("#confirmpassword").val("");
                            setTimeout(function() {
                                window.location.href = "login.php";
                            }, 2000); // 2000 milliseconds = 2 seconds
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
