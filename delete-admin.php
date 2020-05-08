<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
?>

<?php
$link = mysqli_connect("localhost", "root", "", "yourtrainer");
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id=$_REQUEST['id'];

$sql = "DELETE FROM admins WHERE id = $id ";



if(mysqli_query($link, $sql)){

	
 
    header("location: awelcome3.php");
   
    
	
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   header("location: awelcome3.php");
}
 


mysqli_close($link);
?>



<?php 
/*
	$conn = mysqli_connect("localhost", "root", "", "yourtrainer");
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['id'])) {
		// getting the user information
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
	
   
        
        if ($id == $_SESSION['id']){
            //logged in admin should not be deleted
            header('location:awelcome3.php?err=logged in admin cannot be deleted');
        }
        else{
            $query= "DELETE FROM admins WHERE id = $id " ;

            $result = mysqli_query($conn,$query);
            if($result){
                //deleted
                header('location:awelcome3.php?msg=Deletion Sucessful');
            }
            else{
                header('location:awelcome3.php?err=Deletion Failed');
            }
        }
}

	else{
        header('location:awelcome3.php');
    }

*/
?>
