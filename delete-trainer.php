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