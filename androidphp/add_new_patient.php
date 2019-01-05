<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['patient_name']) && isset($_POST['patient_gender']) && isset($_POST['patient_address']) && isset($_POST['patient_email'])) {
 
    $patient_name = $_POST['patient_name'];
    $patient_gender = $_POST['patient_gender'];
    $patient_address = $_POST['patient_address'];
    $patient_email = $_POST['patient_email'];

 
     define('DB_USER', "a9723596_patient"); // db user
define('DB_PASSWORD', ""); // db password (mention your db password here)
define('DB_DATABASE', "a9723596_data"); // database name
define('DB_SERVER', "mysql13.000webhost.com"); // db server
// array for JSON response

 

 $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);


$sql = "INSERT INTO patient_info(patient_name,patient_gender,patient_email,patient_address) VALUES('$patient_name','$patient_gender','$patient_email','$patient_address')";

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