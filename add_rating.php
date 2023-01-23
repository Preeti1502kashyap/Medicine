<?php
include("include/connectivity.php");
if(!empty($_POST["rating"]) && !empty($_POST["id"])){ 
$query ="UPDATE detail SET rating='" . $_POST["rating"] . "' WHERE id='" . $_POST["id"] . "'";
$result = mysqli_query($conn,$query);
if(!$result){
	die(mysqli_error().$query);
}
}
?>