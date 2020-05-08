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

  <title>Edit Profile Page</title>

  
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
      <script>
			function myFunction() {
    				alert("Updated your account");
			}
    </script>

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

  

  <!-- form section -->
  <section id="form" class="about-section text-center bg-black">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          
          <h2 class="text-white mb-4">Update Your Account </h2><br>
         </div>
      </div>

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

<div class="form">
<form action= "account.php" method ="post" class="needs-validation" novalidate>
   
          
   <div class= "form-row">
   <div class="col-md-6 mb-3">
           <label style="color:white;" for="validationCustom">Username</label>
           <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $_SESSION['username']; ?>" required>
           <div class="invalid-feedback">Enter your username</div>
           </div>
   </div>      


       <div class="form-row">
           <div class="col-md-6 mb-3">
           <label style="color:white;" for="validationCustom01">Name</label>
           <input type="text" class="form-control" id="n" name="n" placeholder="name" value="<?php echo $record['fullname']; ?>" required>
           <div class="invalid-feedback">Enter a name</div>
           </div>
           <div class="col-md-3 mb-3">
           <label style="color:white;" for="validationCustom02">Age</label>
           <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?php echo $record['age']; ?>" required>
           <div class="invalid-feedback">Enter your Age</div>
           </div>
           <div class="col-md-3 mb-3">
           <label style="color:white;" >Gender</label>
           <div class="form-group">
<select class="custom-select" id="gender" name="gender"required>
 <option value=""><?php echo $record['gender']; ?></option>
 <option value="Male">Male</option>
 <option value="Female">Female</option>
</select>
<div class="invalid-feedback">Select your gender</div>
       </div>
</div>
   </div>

<div class="form-row">
           <div class="col-md-8 mb-3">
       <label style="color:white;" for="validationCustom03">Email</label>
       <input type="text" class="form-control" id="email" name="email" placeholder="Email" value=" <?php echo $record['email']; ?>"required>
       <div class="invalid-feedback">Please provide a vaild email</div>
   </div>
<div class="col-md-4 mb-3">
 <label style="color:white;" for="validationCustom04">Mobile</label>
 <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo $record['mobile']; ?>"required>
 <div class="invalid-feedback">
   Please provide a valid Mobile number
 </div>
</div>

</div>

<div class="form-row">

<div class="col-md-4 mb-3">
<label style="color:white;">Location</label> 
<div class="form-group">
<select class="custom-select" id ="location" name="location"  required>
 <option value=""><?php echo $record['city']; ?></option>
 <option value="Colombo">Colombo</option>
 <option value="Kaluthara">Kaluthara</option>
 <option value="Gampaha">Gampaha</option>
</select>
<div class="invalid-feedback">Select your Location</div>
</div>
</div>

<div class="col-md-4 mb-3">
       <label style="color:white;" for="validationCustom05">Years of experience</label>
       <div class="form-group">
<select class="custom-select" id="experience" name=experience required>
 <option value=""><?php echo $record['experience']; ?></option>
 <option value="Less than 1 year">Less than 1 year</option>
 <option value="1 year">1 year</option>
 <option value="2 years">2 years</option>
 <option value="3 years">3 year</option>
 <option value="4 years">4 year</option>
 <option value="5 years">5 year</option>
 <option value="More than 5 years">More than 5 years</option>
</select>
<div class="invalid-feedback">Add your Years of Experience</div>
</div>
   
</div>
<div class="col-md-4 mb-3">
 <label style="color:white;" for="validationCustom06">Starter Price</label>
 <div class="form-group">
<select class="custom-select" id="price " name="price" required>
 <option value=""><?php echo $record['price']; ?></option>
 <option value="1000 - 2000">1000 - 2000</option>
 <option value="2000 - 3000">2000 - 3000</option>
 <option value="3000 +">3000 +</option>

</select>
<div class="invalid-feedback">Add the Starter Price</div>
</div>

</div>
</div>
<div class="form-row">

<div class="col-md-12 mb-3">
   <label style="color:white;">Profile Description</label> 


<textarea class="form-control " id="description" name="description" placeholder="Tell us about you" value="<?php echo $record['detail']; ?>"required></textarea>
<div class="invalid-feedback">Please enter Profile Description</div>
</div>
</div>

<!-- picture -->
<div class="form-row">

<div class="col-md-6 mb-3">
<label style="color:white;">Upload Profile Picture</label> 
   <div class="custom-file">
   <input type="file" class="custom-file-input"  name="image" >
   <label class="custom-file-label" for="validatedCustomFile" style="color:white;">Choose file for Profile Picture</label>
   <div class="invalid-feedback">Example invalid custom file feedback</div>
   </div>


</div>
</div>






<br><br>

<input type="submit" class="btn btn-primary" value="Update Account" onclick="myFunction()"name="submit" >
<a href="page.php" class="btn btn-secondary " > Cancel</a>
</form>


</div>
<br><br>

<?php } ?>
        
        


          
        </div>
      </div>

    </div>

   

<!-- Footer -->
<footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy; miniproject Website 2020
    </div>
  </footer>
  </section>

  

  

  

  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  
  <script src="js/grayscale.min.js"></script>

  <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>

</html>
