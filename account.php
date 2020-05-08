<?php

$link = mysqli_connect("localhost", "root", "", "yourtrainer");
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
   

$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$n = mysqli_real_escape_string($link, $_REQUEST['n']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$mobile = mysqli_real_escape_string($link, $_REQUEST['mobile']);
$location = mysqli_real_escape_string($link, $_REQUEST['location']);
$experience = mysqli_real_escape_string($link, $_REQUEST['experience']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);
$image = $_FILES['image']['name'];

$sql = "UPDATE Trainers 
        SET fullname='$n', age='$age', gender='$gender', 
            email='$email', mobile='$mobile', city='$location', 
            experience='$experience' ,price='$price', detail ='$description' , picture ='$image'
        WHERE username='$username' ";


$msg = "";
$target = "images/".basename($image);





if(mysqli_query($link, $sql)){

                $querry = "SELECT type FROM trainers WHERE id = $id "; 
                $users = mysqli_query($link, $querry);
                $user = mysqli_fetch_assoc($users);
                  
                 
                  $type = $user['type'];
                  
                  
                    if($type=="T"){
                      header("location: trainer.php");
                    } else{
                     header("location: admin.php");
                    }    
                  
    //echo "Records added successfully.";

	
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   header("location: create.php");
}
 
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}


mysqli_close($link);

?>




