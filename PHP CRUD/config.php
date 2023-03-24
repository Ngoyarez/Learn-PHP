<?php
/* Database credentials */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo2');

//Attempt to connect to MYSQL database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//CHECK CONNECTION
if($conn == false){
    die("ERROR: Could not connect. ".mysqli_connect_error());
}

?>