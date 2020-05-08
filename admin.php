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

  <title>View Profile Page</title>

  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  
  <link href="css/grayscale.min.css" rel="stylesheet">
  <style>
      .label {
  color: white;
  
}
      </style>
      

</head>

<body >

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
            <a class="nav-link js-scroll-trigger" href="home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="addadmin.php">Add Admin</a>
         </li>

          <div class="dropdown show">
          <a class="nav-link" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          View/Delete
          </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              
              <a class="dropdown-item" href="view_a.php">Admins</a>
              <a class="dropdown-item" href="view_t.php">Trainers</a>
            </div>
          </div>

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


  

  <!-- profile section -->
  <section id="profile" class="about-section text-center bg-black">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">

<?php

      $link = mysqli_connect("localhost", "root", "", "yourtrainer");
 

      if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }

$username= $_SESSION['username'];


$sql = "SELECT  fullname, age, gender, city, detail, experience, price, email, mobile FROM trainers WHERE username='$username' ;";
$resultset = mysqli_query($link, $sql) or die("database error:". mysqli_error($link));

while( $record = mysqli_fetch_assoc($resultset) ) {
?>

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

    <div class="card-footer bottom">
        <a href="edit.php" class="btn btn-primary">Edit Profile</a>
    </div>
</div>
<br><br>

<?php } ?>

    


      </div>
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


   
