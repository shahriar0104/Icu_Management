<?php 

$host="localhost";
$username="root";
$password="";
$db_name="icu_management";

/*$host="localhost";
$username="id7332972_icu";
$password="root123";
$db_name="id7332972_icu";*/
// Create connection
$conn = new mysqli($host, $username, $password,$db_name);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else{
	
}
?>
