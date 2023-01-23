<?php include "include/connectivity.php";
$id=$_GET['id'];
$query="delete from cart where id={$id}";
$exe=mysqli_query($conn,$query);
if($exe){
	echo "<script>alert('succesfully deleted');window.location='manageCart.php';</script>";
}
?>