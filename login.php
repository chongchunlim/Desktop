<?php

// array for JSON response
$response = array();


define ('DB_HOST','localhost');
define('DB_DATABASE','id8385629_androproj');
define ('DB_USER', 'id8385629_rgm79g');
define ('DB_PASSWORD', 'rgm79g');

$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD);



?>