<?php include "include/connectivity.php";
$Id=$_GET['id'];
$query="delete from register where Id={$Id}";
$exe=mysqli_query($conn,$query);
if($exe){
	echo "<script>alert('succesfully deleted');window.location='manageRegister.php';</script>";
}
?>