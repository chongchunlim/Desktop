<?php
 
/*
 * Following code will get single product details
 * A product is identified by product id (pid)
 */
 
// array for JSON response
$response = array();
define('DB_USER', "a9723596_patient"); // db user
define('DB_PASSWORD', ""); // db password (mention your db password here)
define('DB_DATABASE', "a9723596_data"); // database name
define('DB_SERVER', "mysql13.000webhost.com"); // db server
// array for JSON response

 

 $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);
 
// check for post data
if (isset($_GET["id"])) {
    $id = $_GET['id'];
 
$sql = "SELECT * FROM patient_info WHERE id = $id";
$result = $conn->query($sql) or die (mysqli_connect_error());

    // get a product from products table
    //$result = mysql_query("SELECT *FROM patient_info WHERE id = $id");
 
    if (!empty($result)) {
        // check for empty result
        if (mysqli_num_rows($result) > 0) {
 
            $result = mysqli_fetch_array($result);
 
            $product = array();
            $product["id"] = $result["id"];
            $product["patient_name"] = $result["patient_name"];
            $product["patient_gender"] = $result["patient_gender"];
            $product["patient_address"] = $result["patient_address"];
            $product["patient_email"] = $result["patient_email"];
           
            // success
            $response["success"] = 1;
 
            // user node
            $response["patients"] = array();
 
            array_push($response["patients"], $product);
 
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