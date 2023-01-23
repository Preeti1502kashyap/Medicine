<!--header include-->
<?php include "include/header.php";
include "include/connectivity.php";
$q="select * from category order by Id ASC";
$exe=mysqli_query($conn,$q);
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Category</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
      <a href="insertCategory.php" class="float-right btn btn-primary ">Insert</a>
    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        <?php while($fetch=mysqli_fetch_array($exe)) { ?>

        <tr class="active">
          <th scope="row" ><?php echo $fetch['id']?></th>
          <td><?php echo $fetch['name']?></td>
          <td> <a href="deleteCategory.php?id=<?php echo $fetch['id'];?>" class="btn btn-danger">Delete</a>
           <a href="updateCategory.php?id=<?php echo $fetch['id'];?>" class="btn btn-info">Update</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
   </div>
     <!--include footer-->
  <?php include "include/footer.php";?>