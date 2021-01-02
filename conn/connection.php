<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "online_booking_hairsalon";

$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

if(!$con){
  die("Connection failed: " . $con->connect_error);
}


?>
