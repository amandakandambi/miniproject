<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
?>

<?php
$link = mysqli_connect("localhost", "root", "", "yourtrainer");
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

 $id = $_SESSION["id"] ;

$sql = "DELETE FROM trainers WHERE id = $id ";



if(mysqli_query($link, $sql)){

	session_destroy();
 
    header("location: login.php");
    exit;
    
	
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   header("location: welcome5.php");
}
 


mysqli_close($link);
?>