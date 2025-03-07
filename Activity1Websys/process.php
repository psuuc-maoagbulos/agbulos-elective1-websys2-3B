<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    body{
        background-color: aliceblue;
    }
</style>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">User Profile</h1>
            </div>
            <div class="card-body">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Retrieve data from the form
                    $name = $_POST["name"];
                    $currentCity = $_POST["Current_city"];
                    $hometown = $_POST["Hometown"];
                    $sex = $_POST["sex"];
                    $birthday = $_POST["birthday"];
                    $relationshipStatus = $_POST["relationship_status"];
                    $employer = isset($_POST["Employed"]) ? $_POST["Employed"] : (isset($_POST["Unemployed"]) ? $_POST["Unemployed"] : (isset($_POST["Student"]) ? $_POST["Student"] : ""));
                    $education = $_POST["education"];
                    $politicalViews = isset($_POST["checkbox"]) ? implode(", ", $_POST["checkbox"]) : "";
                    $favoriteBook = $_POST["book"];
                    $favoriteQuote = $_POST["Quote"];
                    $street = $_POST["street"];
                    $city = $_POST["city"];
                    $province = $_POST["province"];
                    $zip = $_POST["zip"];

                    // Display user profile information using Bootstrap
                    echo "<div class='container'>";
                    echo "<div class='row'>";
                    echo "<div class='col-md-4'>";
                    echo "<h3>$name</h3>";
                    
                    // Display the uploaded profile picture
                    if (isset($_FILES['profile_picture'])) {
                        $profilePictureName = $_FILES['profile_picture']['name'];
                        echo "<img src='uploads/$profilePictureName' class='img-fluid rounded-circle' alt='Profile Picture'>";
                    }
                    
                    echo "<p>Sex: $sex</p>";
                    echo "<p>Birthday: $birthday</p>";
                    echo "<p>Relationship Status: $relationshipStatus</p>";
                    echo "<p>Employment Status: $employer</p>";
                    echo "<p>Education: $education</p>";
                    echo "<p>Political Views: $politicalViews</p>";
                    echo "</div>";
                    echo "<div class='col-md-8'>";
                    echo "<p><strong>Current City:</strong> $currentCity</p>";
                    echo "<p><strong>Hometown:</strong> $hometown</p>";
                    echo "<p><strong>Favorite Book:</strong> $favoriteBook</p>";
                    echo "<p><strong>Favorite Quote:</strong> $favoriteQuote</p>";
                    echo "<h2 class='mt-4'>Contact Information:</h2>";
                    echo "<p><strong>Street:</strong> $street</p>";
                    echo "<p><strong>City:</strong> $city</p>";
                    echo "<p><strong>Province:</strong> $province</p>";
                    echo "<p><strong>Zip Code:</strong> $zip</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    // Redirect to the form page if accessed directly
                    header("Location: index.html");
                    exit();
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
