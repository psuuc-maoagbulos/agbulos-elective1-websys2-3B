<?php
session_start();
if (!isset($_SESSION['username'])) {
  // Redirect to the login page
  header("Location: ../user_registration/login.php");
  exit(); // Make sure to exit after sending the header to prevent further execution
} else {
  $username = $_SESSION['username'];
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #container {
            margin: 20px;
        }

        input[type="text"] {
            width: 70%;
            padding: 10px;
            margin-right: 10px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #FFA500;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #FF4500;
        }

        #results {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            margin: 10px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            background-color: #fff;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            padding: 20px;
        }

        .ingredients {
            margin-top: 10px;
        }
        #usercircle:hover{
  cursor: pointer;
}
    </style>
    <!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<!-- Include Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Your custom stylesheets -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="userdash.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Your custom scripts -->
<script src="userdash.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-">
    <a class="navbar-brand" href="#">
      <span class="logo-text">FlavorFusion</span>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a href="userdashboard.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="sharepage.php" class="nav-link">Share Recipe</a>
        </li>
        <li class="nav-item">
          <a  href="favoritespage.php" class="nav-link"  >Favorites</a>
        </li>
        <li class="nav-item">
          <a href="searchrecipeworld.php"  class="nav-link">Search Recipe World Wide</a>
        </li>
      
      </ul>
      <ul class="navbar-nav ml-auto" id="usercircle">
        <li class="nav-item dropdown">
          <div style=" background: rgb(250,176,123);
background: radial-gradient(circle, rgba(250,176,123,1) 0%, rgba(249,215,185,1) 100%) !important; /* Set the background color */
        border-radius: 50%; /* Ensure it's a circle */
        width: 50px; /* Set the width of the user image */
        height: 50px; /* Set the height of the user image */
        padding: 10px; " class="user-circle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            // You can replace 'path/to/user-image.jpg' with the actual path to the user's image
            $userImage = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPKf7bdPa_aOiwGzeNO4YY4YwvAya-Hy8vOUtOFkfi1SD3HDDhjCz7Ux6OqLKNiD3SIxM&usqp=CAU';
            if (file_exists($userImage)) {
              echo '<img src="' . $userImage . '" alt="User Image" class="user-image">';
            } else {
              echo '<span class="user-details text-white small">' . $username . '</span>';
            }
            ?>
          </div>
          <div class="dropdown-menu" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="mypost.php">My Post</a>
            <a class="dropdown-item" href="contactui.php">Contact us</a>
            <a class="dropdown-item" href="report.php ">Reports a post</a>

            <button style="
    background-color: transparent;
    color: inherit;
" class="btn btn-link text-dark ml-3" data-toggle="modal" data-target="#logoutModal">
             Logout
              </button>      </div>
        </li>


      </ul>

      <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <button class="btn btn-danger logout-btn"><a class="logout" href="logout.php">Logout</a></button>
            </li>
        </ul> -->
    </div>

  </nav>
    <div id="container">
        <h2 class="text-center mb-4">Recipe Search</h2>
        <div class="input-group mb-3">
        <input type="text" id="textbox" class="form-control" placeholder="Enter a meal name...">
        <div class="input-group-append">
            <button class="btn text-white" style="width: 100%; text-decoration: white; background-color: #ff6600;" onclick="searchRecipe()">Search</button>
            <button id="start-btn" class="btn btn-danger btn-block"><i class="fas fa-microphone"></i></button>

    </div>
                
            
        </div>
        <div id="results" class="d-flex flex-wrap justify-content-center"></div>
    </div>


    <script>
        function searchRecipe() {
            var searchTerm = document.getElementById("textbox").value;
            var apiUrl = 'https://www.themealdb.com/api/json/v1/1/search.php?s=' + searchTerm;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => displayResults(data.meals))
                .catch(error => console.error('Error:', error));
        }

        function displayResults(meals) {
            var resultsContainer = document.getElementById("results");
            resultsContainer.innerHTML = '';

            if (meals) {
                meals.forEach(meal => {
                    var cardDiv = document.createElement("div");
                    cardDiv.className = "card";

                    cardDiv.innerHTML = `
                        <img src="${meal.strMealThumb}" class="card-img-top" alt="Meal Image">
                        <div class="card-body">
                            <h5 class="card-title">${meal.strMeal}</h5>
                            <p class="card-text">${meal.strInstructions.slice(0, 100)}...</p>
                            <div class="ingredients">
                                <h6>Ingredients:</h6>
                                <ul>${formatIngredients(meal)}</ul>
                            </div>
                        </div>
                    `;

                    resultsContainer.appendChild(cardDiv);
                });
            } else {
                resultsContainer.innerHTML = '<p class="text-center">No meals found.</p>';
            }
        }

        function formatIngredients(meal) {
            var ingredients = [];
            for (let i = 1; i <= 20; i++) {
                if (meal['strIngredient' + i]) {
                    ingredients.push(`<li>${meal['strIngredient' + i]} - ${meal['strMeasure' + i]}</li>`);
                }
            }
            return ingredients.join('');
        }
        var speechRecognition = window.webkitSpeechRecognition;
var recognition = new speechRecognition();
var textbox = $("#textbox");
var instructions = $("#instructions");
var content = '';
var isRecognitionStarted = false; // Flag to track the recognition state

recognition.continuous = true;
recognition.interimResults = false; // Set to false for faster onspeechend

recognition.onstart = function () {
    instructions.text("Voice Recognition is on");
    isRecognitionStarted = true;
};

recognition.onspeechend = function () {
    instructions.text("No Activity");
    isRecognitionStarted = false;
    content += ' '; // Add a space when recognition stops
    textbox.val(content);
};

recognition.onerror = function () {
    instructions.text("Try Again");
    isRecognitionStarted = false;
};

recognition.onresult = function (event) {
    var current = event.resultIndex;
    var transcript = event.results[current][0].transcript;

    content += transcript;

    textbox.val(content);
};

$("#start-btn").click(function (event) {
    if (isRecognitionStarted) {
        recognition.stop();
    } else {
        recognition.start();
    }
});

textbox.on('input', function () {
    content = $(this).val();
});

    </script>
    <!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="logout.php" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
