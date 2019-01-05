<?php
 
/*
 * Following code will delete a product from table
 * A product is identified by product id (pid)
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['id'])) {
    $id = $_POST['id'];
 
define('DB_USER', "a9723596_patient"); // db user
define('DB_PASSWORD', ""); // db password (mention your db password here)
define('DB_DATABASE', "a9723596_data"); // database name
define('DB_SERVER', "mysql13.000webhost.com"); // db server
// array for JSON response

 

 $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);
 
    // mysql update row with matched pid
 $sql= "DELETE FROM patient_info WHERE id = $id";

$result = $conn->query($sql) or die (mysqli_connect_error()); 
 
    // check if row deleted or not
    if (mysqli_affected_rows() > 0) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Product successfully deleted";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No product found";
 
        // echo no users JSON
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