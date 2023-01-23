<!--header include-->
<?php include "include/header.php";
include "include/connectivity.php";
$q="select * from feedback order by id ASC";
$exe=mysqli_query($conn,$q);
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Testimonial</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>name</th>
          <th>Email</th>
          <th>Message</th>
          <th>Action</th>

        </tr>
      </thead>

      <tbody>
        <?php while($fetch=mysqli_fetch_array($exe)) { ?>

        <tr class="active">
          <th scope="row" ><?php echo $fetch['id']?></th>
          <td><?php echo $fetch['name']?></td>
          
          <td><?php echo $fetch['Email']?></td>
          
          <td><?php echo $fetch['Message']?></td>
          <td> <a href="deleteFeedback.php?id=<?php echo $fetch['id'];?>" class="btn btn-danger">Delete</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
   </div>
     <!--include footer-->
  <?php include "include/footer.php";?>