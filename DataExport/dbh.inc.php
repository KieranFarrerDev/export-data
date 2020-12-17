<?php
//DB details
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'exmato';

//Create connection and select DB
$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Unable to connect database: " . $conn->connect_error);
}
