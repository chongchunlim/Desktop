<?php

// array for JSON response
$response = array();


define ('DB_HOST','localhost');
define('DB_DATABASE','id8385629_androproj');
define ('DB_USER', 'id8385629_rgm79g');
define ('DB_PASSWORD', 'rgm79g');


$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }else
   echo "connection successful >>> ";
   

$sql = "insert into users (username,password) values ('jo','jo');";

if(mysqli_query($con,$sql))
{
    echo "success";
}else
{
    echo "death";
}
?>