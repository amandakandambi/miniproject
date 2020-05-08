<?php
session_start();

$link = mysqli_connect("localhost", "root", "", "yourtrainer");
 if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$id =  $_SESSION["id"];
   

$querry = "SELECT fullname,type FROM trainers WHERE id = $id "; 
$users = mysqli_query($link, $querry);
$user = mysqli_fetch_assoc($users);
  
if(mysqli_query($link, $querry)){

  $fullname = $user['fullname'];
  $type = $user['type'];
  
  if( $fullname == ""){
    header("location: create.php");
  }
  else{
    if( $type == "T"){
      header("location: trainer.php");
     }else{
      header("location: admin.php");
     }     

  }

	
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   header("location: home.php");
}
 



mysqli_close($link);

?>




