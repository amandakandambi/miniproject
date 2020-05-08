<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home Page</title>

  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  
  <link href="css/grayscale.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.html">Your Trainer</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#header">Home</a>
          </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          
        
     <div class="dropdown show">
          <a class="nav-link" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class='fas fa-user-circle' style='font-size:20px'></i> 
          </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              
              <a class="dropdown-item  bg-info" href="logout.php">Log Out</a>
              <div class="dropdown-divider"></div>
              <h6 class="dropdown-header">Settings</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item  bg-warning" href="reset-password.php">Reset-password</a>
              <div class="dropdown-divider"></div>
              <a href="" class="dropdown-item  bg-danger" data-toggle="modal" data-target="#deletemodel">Delete Account</a>
              
            </div>
          </div>
           
        </ul>
      </div>
    </div>
    
  </nav>
  <div class="modal" tabindex="-1" role="dialog" id="deletemodel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              
          <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <p>Are you sure you want to delete your account?</p><br>
              <div class="text-right">
              <a href="delete_account.php" class="btn btn-danger " >Delete </a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
              </div>
          </div>
      
    </div>
  </div>
</div>


  <!-- Header -->

  <header class="masthead bg-black" id="header">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Your Trainer</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">Enjoy your journey as a Trainer</h2><br>


       
        <p><a href="page.php" class="btn btn-primary">  View Profile</a></p><br>

      
      </div>
      
    </div>
    
  </header>


  
  <!-- Contact Section -->
  
  
  <section id ="contact" class="contact-section bg-black">
    
    <div class="container">

      <div class="row">
        <div class="col-md-6 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Email</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="#">findyourtrainer@gmail.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Phone</h4>
              <hr class="my-4">
              <div class="small text-black-50">+94772243695</div>
            </div>
          </div>
        </div>
      </div>

      <div class="social d-flex justify-content-center">
        <a href="#" class="mx-2">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="mx-2">
          <i class="fab fa-facebook-f"></i>
        </a>
        
      </div>

    </div>
 
</section>

  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy; miniproject Website 2020
    </div>
  </footer>

  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  
  <script src="js/grayscale.min.js"></script>

</body>

</html>

   