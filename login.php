<?php
//login session
session_start();
 
//logged in:direct to home page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

    
    header("location: home.php");
    exit;
}
 
//dbconnection
require_once "config.php";
 
$username = $password = "";
$username_err = $password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
   

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty($username_err) && empty($password_err)){
     
//sql query
        $sql = "SELECT id, username, password FROM trainers WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
           

            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
          

            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            
                            session_start();
                            
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: home.php");          
                  
               
                  
                 /* $querry = "SELECT fullname,type FROM trainers WHERE id = $id "; 
                  $users = mysqli_query($link, $querry);
                  $user = mysqli_fetch_assoc($users);
                  
                  $fullname = $user['fullname'];
                  $type = $user['type'];
                  
                 

                  if( $fullname==''){
                    header("location: create.php");
                  }
                  else{
                    if( $type == "T"){
                      header("location: trainer.php");
                     }else{
                      header("location: admin.php");
                     }     

                  }*/
                    
                        
                         
                     



                        } else{
                            
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
       
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

  <title>Login Page</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/grayscale.min.css" rel="stylesheet">

  

</head>

<body >

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger text-dark" href="index.html">Your Trainer</a>
      
    </div>
  </nav>
  
<!-- login form section -->
<section id="about" class="projects-section bg-light">
    <div class="container">

    
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-8 col-lg-7">
        <div class="featured-text text-center text-lg-left">
            <h4>Welcome To Your Trainer</h4>
            <p class="text-black-50 mb-0">Login Here </p>
          </div>
        </div>
        <div class="col-xl-4 col-lg-5">
        <div class="small text-black-50">Please fill in your login information</div><br><br>

          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block "><?php echo $username_err; ?></span>
              </div>    
              <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block "><?php echo $password_err; ?></span>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
              </div><br>
                <p>Don't have an account? <a href="register.php">Register now</a>.</p>
              </div>
          </form>
        </div>
      </div>

      

    </div>
  </section>

 

  <!-- Footer -->
  <footer class="bg-white small text-center text-black-50">
    <div class="container ">
      Copyright &copy; miniproject Website 2020
    </div>
  </footer>

  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  
  <script src="js/grayscale.min.js"></script>

</body>

</html>