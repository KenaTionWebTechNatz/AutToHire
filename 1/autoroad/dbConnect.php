<?php
// connection constants
   $hostname ="localhost";
   $hostuser ="root";
   $hostpass ="";
   $dbname ="carhireproject";
  

 // Create the connection 
 
  $conn = new mysqli($hostname, $hostuser, $hostpass, $dbname);  

 // Check connection
 
  if($conn->connect_error){
    die("Connection failed".$conn->error);
  }else{
  	//print"Connection Successfull";
    $error = array();
  } 




?>