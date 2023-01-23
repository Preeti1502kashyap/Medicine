<?php include "include/connectivity.php";
$Id=$_GET['id'];
$query="delete from feedback where id={$Id}";
$exe=mysqli_query($conn,$query);
if($exe){
	echo "<script>alert('succesfully deleted');window.location='manageFeedback.php';</script>";
}
?>