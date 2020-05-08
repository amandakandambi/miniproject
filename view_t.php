<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
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

  <title>Trainers Page</title>

  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  
  <link href="css/grayscale.min.css" rel="stylesheet">

  <style>
      table, th, td {
            width :100%;
}
th, td {
            padding: 2px;
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
            <a class="nav-link js-scroll-trigger" href="page.php">Profile</a>
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
  
<!-- table-->
<section class="contact-section bg-black">
    
    <div class="container-fluid">

      <div class="row">
        

        <div class="col-md-12 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              
              <h4 class="text-uppercase m-0">Trainers</h4>
              <hr class="my-4">
              <br>


              <table  >
			<tr>
				        <th>id</th>
                <th>username</th>
                <th>fullname</th>
                <th>age</th>
                <th>gender</th>
                <th>city</th>
                <th>email</th>
                <th>mobile</th>
                <th>detail</th>
                <th>experience</th>
                <th>price</th>
                <th>delete</th>
			</tr>

			

		

    <?php 

	$conn = mysqli_connect("localhost", "root", "", "yourtrainer");
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }


	$user_list = '';

	// getting the list of users
	$query = "SELECT id, username ,fullname, age, gender, city, email, mobile, detail, experience, price FROM trainers  WHERE type= 'T'";
	$users = mysqli_query($conn, $query);

	//verify_query($users);

	while ($user = mysqli_fetch_assoc($users)) {
		$user_list .= "<tr>";
		$user_list .= "<td>{$user['id']}</td>";
    $user_list .= "<td>{$user['username']}</td>";
    $user_list .= "<td>{$user['fullname']}</td>";
    $user_list .= "<td>{$user['age']}</td>";
    $user_list .= "<td>{$user['gender']}</td>";
    $user_list .= "<td>{$user['city']}</td>";
    $user_list .= "<td>{$user['email']}</td>";
    $user_list .= "<td>{$user['mobile']}</td>";
    $user_list .= "<td>{$user['detail']}</td>";
    $user_list .= "<td>{$user['experience']}</td>";
    $user_list .= "<td>{$user['price']}</td>";
		
    $user_list .= "<td>
                  <a class=\"btn btn-danger\" href=\"delete-admin.php?user_id={$user['id']}\" onclick= \"return confirm('Are you sure');\">Delete</a>
                  </td>";
		$user_list .= "</tr>";
    }
    
    echo $user_list; 
 ?>
</table>


        
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
