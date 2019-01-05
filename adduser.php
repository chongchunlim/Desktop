<?php

// array for JSON response
$response = array();


define ('DB_HOST','localhost');
define('DB_DATABASE','id8385629_androproj');
define ('DB_USER', 'id8385629_rgm79g');
define ('DB_PASSWORD', 'rgm79g');

if (isset($_POST['username'])&&isset($_POST['password']))
{	

$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD);

$sql = "insert into users (username,password) values ('$username','$password')";

// mysql inserting a new row
   $result = $conn->query($sql) or die (mysqli_connect_error()); 


    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}

?>