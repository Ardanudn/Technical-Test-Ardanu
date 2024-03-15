<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test_ardanu";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Connection failed: ". mysqli_error());
}

?>