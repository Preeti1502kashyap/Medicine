<!--header include-->
<?php include "include/header.php";
include "include/connectivity.php";
$q="select * from pres_nonpres order by Id ASC";
$exe=mysqli_query($conn,$q);
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Prescription</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Address</th>
          <th>State_country</th>
          <th>Email</th>
          <th>Phone No.</th>
          <th>Referenc</th>
          <th>Description 1</th>
          <th>Description 2</th>
          <th>Action</th>

        </tr>
      </thead>

      <tbody>
        <?php while($fetch=mysqli_fetch_array($exe)) { ?>

        <tr class="active">
          <th scope="row" ><?php echo $fetch['id']?></th>
          <td><?php echo $fetch['name']?></td>
          <td><?php echo $fetch['gender']?></td>
          <td><?php echo $fetch['address']?></td>
          <td><?php echo $fetch['state_country']?></td>
          <td><?php echo $fetch['email']?></td>
          <td><?php echo $fetch['phone']?></td>
          <td><?php echo $fetch['ref']?></td>
          <td><?php echo $fetch['desc1']?></td>
          <td><?php echo $fetch['desc2']?></td>
          <td> <a href="deletePres.php?id=<?php echo $fetch['id'];?>" class="btn btn-danger">Delete</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
   </div>
     <!--include footer-->
  <?php include "include/footer.php";?>