<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 

require_once "config.php";
 

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
   
    if(empty($new_password_err) && empty($confirm_password_err)){
        
        $sql = "UPDATE trainers SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            

            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            

            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    

    mysqli_close($link);
}
?>
 
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Resetpassword Page</title>

 
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <link href="css/grayscale.min.css" rel="stylesheet">

  

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
            <a class="nav-link js-scroll-trigger" href="page.php">Profile</a>
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
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
          </div>
      
    </div>
  </div>
</div>

  
<!-- Reset form section -->
<section class="contact-section bg-black">
    
    <div class="container ">

      <div class="row">
        <div class="col-md-6 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              
              <h4 class="text-uppercase m-0">Reset Password</h4>
              <hr class="my-4"><br>
              <div class="small text-black-50">Please fill the form to reset password</div><br><br>

              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="page.php">Cancel</a>
            </div>
        </form>


        </div>
          </div>
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