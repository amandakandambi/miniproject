<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Find Trainer Page</title>


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
    				alert("Thank you for joining with us");
			}
    </script>


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

  

   <!-- form section -->
   <section id="form" class="about-section text-center bg-black">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          
          <h2 class="text-white mb-4">Find  Your trainer </h2><br>
         </div>
      </div>

      <div class="row">
        <div class="col-lg-8 mx-auto">


        <form action= "u_sugesstedtrainers.php" method ="post" class="needs-validation" novalidate>
   
          
        

            <div class="form-row">
            <div class="col-md-4 mb-3">
  <label style="color:white;">Location</label> 
  <div class="form-group">
    <select class="custom-select" id ="location" name="location"required>
      <option value="">Select your location</option>
      <option value="Colombo">Colombo</option>
      <option value="Kaluthara">Kaluthara</option>
      <option value="Gampaha">Gampaha</option>
    </select>
    <div class="invalid-feedback">Select your Location</div>
  </div>
</div>
                
                <div class="col-md-4 mb-3">
                <label style="color:white;" >Prefered Gender</label>
                <div class="form-group">
    <select class="custom-select" id="gender" name="gender"required>
      <option value="">select gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <div class="invalid-feedback">Select Prefered gender</div>
            </div>
    </div>
        </div>

   

  <div class="form-row">

  

    <div class="col-md-4 mb-3">
            <label style="color:white;" for="validationCustom05">Years of experience</label>
            <div class="form-group">
    <select class="custom-select" id="experience" name=experience required>
      <option value="">Experience</option>
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
      <option value="">Per session</option>
      <option value="1000 - 2000">1000 - 2000</option>
      <option value="2000 - 3000">2000 - 3000</option>
      <option value="3000 +">3000 +</option>
     
    </select>
    <div class="invalid-feedback">Add the Starter Price</div>
    </div>
    
  </div>
</div>
  




  

 

  <br><br>
  
  <input type="submit" class="btn btn-primary" value="Find Trainer" onclick="myFunction()"name="submit" ><br><br>
 
</form>


          
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
