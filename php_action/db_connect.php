<?php 	
$localhost ="localhost";
$username = "root2";
$password = "dieumerci1234";
$dbname = "nexity";

// db connection
$connect= new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}
?>