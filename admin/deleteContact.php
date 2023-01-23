<?php include "include/connectivity.php";
$Id=$_GET['id'];
$query="delete from contact where Id={$Id}";
$exe=mysqli_query($conn,$query);
if($exe){
	echo "<script>alert('succesfully deleted');window.location='manageContact.php';</script>";
}
?>