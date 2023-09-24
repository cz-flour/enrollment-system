<?php
$localhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "enrollment";

//connect database
$conn = mysqli_connect('localhost','root','','enrollment');
if (!$conn) {
	die ("Connection Failed" .mysqli_connect_error());
} 
//
include_once "function.php";



// Include sql_utilities.php file
include_once "sql_utilities.php";
?>