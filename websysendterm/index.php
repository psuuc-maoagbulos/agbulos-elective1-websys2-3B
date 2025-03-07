<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Landing Page</title>
    <style>
    .hero {
      height: 100vh; /* Full viewport height */
      width: 100%; /* Full width */
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden; /* Hide overflowing content */
    }

    .hero img {
      width: 100%;
      height: 100%;
      object-fit: cover; /* Cover the entire space */
    }

    #discover {
      position: absolute;
      top: 72%;
      left: 14%;
      transform: translate(-50%, -50%);
    }

    #con {
      text-align: center;
    }
    .feature-card {
    border: 2px solid orange;
    border-radius: 8px; /* Optional: Adds rounded corners */
    padding: 20px;
  }
  </style>
</head>
<body>

  <!--navigation and hero start-->
<section class="background" id="home">>
  <section class="navigation">
   
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" >
      <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
       
          <a class="navbar-brand" href="#">
           
      <span style="font-size: 30px; color: #FFCA2C; font-weight: 900;">FlavorFusion</span>
          </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarScroll">
          
          <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll justify-content-center " style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#feature">Feature</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
          

            </li>
           
          </ul>
          <button class="btn btn-light border border-warning  mx-2">
  <a href="./user_registration/login.php" style="text-decoration: none; color: inherit; font-size: 20px; "
>Login</a>
</button>
  <button class="btn btn btn-warning"> <a href="./user_registration/signup.php" style="text-decoration: none; color: black; font-size: 20px;" >Register</a></button>
  <button class="btn btn btn-light border border-dark mx-2" > <a href="./user_dashboard/userdashboard.php" style="text-decoration: none; color: black; font-size: 20px;" >Guest</a></button>

          
        </div>
      </div>
    </nav>
  </section>

  <section class="hero">
    <img src="landingg.jpg" alt="Full Width Image" />
      <button type="button" class="btn btn-warning btn-lg" id="discover">
        <a href="./user_registration/login.php" style="text-decoration: none; color: black;">Discover</a>
      </button>
    </div>
  </section>

  <section id="feature">
  <div class="container px-4 py-6" id="featured-3">
    <h2 class="pb-4 text-center">Features</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="feature-card text-center p-4">
          <div class="feature-icon text-warning mb-4">
            <!-- Your SVG icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" >
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
          </div>
          <h3 class="fs-4 fw-bold">Recipe Discovery</h3>
          <p>Provides users a way to discover new recipes.</p>
          <br><br>
        </div>
      </div>

      <div class="col">
        <div class="feature-card text-center p-4">
          <div class="feature-icon  text-warning mb-4">
            <!-- Your SVG icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
          </svg>
            <i class="bi bi-share fs-3"></i>
          </div>
          <h3 class="fs-4 fw-bold">Recipe Upload</h3>
          <p>Allows users to share their own recipes by uploading.</p>
          <br>
        </div>
      </div>

      <div class="col">
        <div class="feature-card text-center p-4">
          <div class="feature-icon  text-warning mb-4">
            <!-- Your SVG icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
          </svg>
          </div>
          <h3 class="fs-4 fw-bold">Step-by-Step Cooking Instructions</h3>
          <p>Presents recipes with detailed step-by-step instructions.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<br><br><br> <br><br>

   <!--navigation and hero end-->

     <!--footer start-->
<section id="contact" style="margin-bottom: 1%;">
  <div class="container">
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 ">
      <div class="col mb-3">
        <a class="navbar-brand" href="#">
    <span style="font-size: 30px; color: #FFCA2C; font-weight: 900;">FlavorFusion</span>
        </a>
      </div>
  
      <div class="col mb-3">
  
      </div>
  
      <div class="col mb-1">
        <h5 style="font-size: 30px; text-shadow: 4px 1px  #FFCA2C;">Navigations</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#home" class="nav-link p-0 text-body-secondary fa-arrow-right"> Home </a></li>
          <li class="nav-item mb-2"><a href="#feature" class="nav-link p-0 text-body-secondary fa-arrow-right"> Feature</a></li>
          <li class="nav-item mb-2"><a href="#footer" class="nav-link p-0 text-body-secondary fa-arrow-right"> Contact</span></a></li>
         
        </ul>
      </div>
  
      <div class="col mb-1">
        <h5 style="font-size: 30px; text-shadow: 4px 1px  #FFCA2C;">Contact Us</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary  fa-arrow-right" > Urdaneta City, Pangasinan</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary fa-arrow-right"> 09917371829</a></li>
          <li class="nav-item mb-2"><a href="mailto:bagcal@gmail.com" class="nav-link p-0 text-body-secondary fa-arrow-right"> bagcal@gmail.com</a></li>
         
         
        </ul>
      </div>
  
      <div class="col mb-1">
        <h5 style="font-size: 30px;text-shadow: 4px 1px  #FFCA2C;">Follow Us</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary fab fa-facebook" > Facebook</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary fab fa-github" > GitHub</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary fab fa-instagram"> Instagram</a></li>
         
        </ul>
      </div>
    </footer>
  </div>
</section>
<center>
<footer class="footerr">
  <p>&copy; 2023 FlavorFusion. All rights reserved.</p>
</footer>
</center>


    
  




<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--footer end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script
src="https://www.chatbase.co/embed.min.js"
chatbotId="HfRFnOlvB5s5VLj3pLseb"
domain="www.chatbase.co"
defer>
</script>
</body>

</html>
