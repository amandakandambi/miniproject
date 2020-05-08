<?php

session_start();
 
//empty the values in array
$_SESSION = array();
 

session_destroy();
 
header("location: login.php");
exit;
?>