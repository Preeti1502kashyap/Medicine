<!--header include-->
<?php include "include/header.php";
include "include/connectivity.php";
$q="select * from contact order by Id DESC";
$exe=mysqli_query($conn,$q);
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>contact</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>fname</th>
          <th>lname</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>

        </tr>
      </thead>

      <tbody>
        <?php while($fetch=mysqli_fetch_array($exe)) { ?>

        <tr class="active">
          <th scope="row" ><?php echo $fetch['Id']?></th>
          <td><?php echo $fetch['fname']?></td>
          <td><?php echo $fetch['lname']?></td>
          <td><?php echo $fetch['Email']?></td>
          <td><?php echo $fetch['Subject']?></td>
          <td><?php echo $fetch['Message']?></td>
          <td> <a href="deleteContact.php?id=<?php echo $fetch['Id'];?>" class="btn btn-danger">Delete</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
   </div>
     <!--include footer-->
  <?php include "include/footer.php";?>