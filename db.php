<?php
$host = "localhost";  
$user = "root";       
$pass = "";           
$dbname = "it_nucleus";  

$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
