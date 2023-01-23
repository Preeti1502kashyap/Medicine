<!--header include-->
<?php include "include/header.php";
include "include/connectivity.php";
$q="select * from register order by Id DESC";
$exe=mysqli_query($conn,$q);
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Register</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>fname</th>
          <th>lname</th>
          <th>Address</th>
          <th>State</th>
          <th>Email</th>
          <th>Password</th>
          <th>Phone</th>
        </tr>
      </thead>

      <tbody>
        <?php while($fetch=mysqli_fetch_array($exe)) { ?>

        <tr class="active">
          <th scope="row" ><?php echo $fetch['Id']?></th>
          <td><?php echo $fetch['fname']?></td>
          <td><?php echo $fetch['lname']?></td>
          <td><?php echo $fetch['Address']?></td>
          <td><?php echo $fetch['State']?></td>
          <td><?php echo $fetch['Email']?></td>
          <td><?php echo md5($fetch['Password'])?></td>
          <td><?php echo $fetch['Phone']?></td>
          <td> <a href="deleteRegister.php?id=<?php echo $fetch['Id'];?>" class="btn btn-danger">Delete</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
   </div>
     <!--include footer-->
  <?php include "include/footer.php";?>