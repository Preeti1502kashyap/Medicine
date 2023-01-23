<?php error_reporting(0);
session_start();
$conn= mysqli_connect('localhost','root','','medicine');
if(!$conn){
	echo "error";
}

?>