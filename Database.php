<?php
$serverName = "localhost:3306";
$userName = "root";
$password = "";
$dbname = "user";

$con = new mysqli($serverName, $userName, $password, $dbname);

if(mysqli_connect_errno()){
    echo "Connection Error";
    exit();
} 
$con->close();

?>
