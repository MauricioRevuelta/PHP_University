<?php

// Database connection
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "university_registration";

// Create connection
$dbConn = new mysqli($serverName, $username, $password, $dbname) ;

// Check connection
if ($dbConn->connect_error){
    die("Connection failed: ".$conn->connect_error);
} else{
   // echo "Database connected";
}

?>