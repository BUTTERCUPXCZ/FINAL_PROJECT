<?php
$serverName = "localhost:3306";
$userName = "root";
$password = "";
$dbname = "diary";

$con = mysqli_connect($serverName, $userName, $password, $dbname);

if($con){
    die(mysqli_error($con));
} 


?>
