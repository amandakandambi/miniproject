<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sugessted Trainers Page</title>

 
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
            <a class="nav-link js-scroll-trigger" href="u_findtrainer.php">Find Trainer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="u_alltrainers.php">All Trainers</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- trainers -->
  <section id="trainers" class="about-section text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          
          <h2 class="text-white mb-4">Sugessted Trainers </h2><br>
         </div>
      </div>

      

  <?php

      $link = mysqli_connect("localhost", "root", "", "yourtrainer");
 

      if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }

      $gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
      $location = mysqli_real_escape_string($link, $_REQUEST['location']);
      $experience = mysqli_real_escape_string($link, $_REQUEST['experience']);
      $price = mysqli_real_escape_string($link, $_REQUEST['price']);


$sql = "SELECT  fullname, age, gender, city, detail, experience, price, email, mobile FROM trainers  
        WHERE gender='$gender' AND city='$location' AND experience ='$experience' AND price='$price'
        ;";
$resultset = mysqli_query($link, $sql) or die("database error:". mysqli_error($link));

while( $record = mysqli_fetch_assoc($resultset) ) {
?>
<div class="row">
<div class="col-sm-6 mx-auto">
<div class="card-deck">
<div class="card hovercard">
    <div class="cardheader">

    </div>
    
    <div class="card-body info">
        <div class="title">
        <h5 class="card-title"><?php echo $record['fullname']; ?></h5> 
        </div>
        <div class="desc"><?php echo $record['age']; ?> , <?php echo $record['gender']; ?> , <?php echo $record['city']; ?></div>
        <div class="desc"><?php echo $record['detail']; ?></div>
        <div class="desc">Starting Price : <?php echo $record['price']; ?></div>
        <div class="desc">Years Of Experience : <?php echo $record['experience']; ?></div>
        <div class="desc"><i class="fas fa-envelope text-primary mb-2"></i> <?php echo $record['email']; ?></div>
        <div class="desc"><i class="fas fa-mobile-alt text-primary mb-2"></i> <?php echo $record['mobile']; ?></div>
        
    </div>

</div>   
</div>
</div>
</div>
<br><br>

<?php } ?>

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