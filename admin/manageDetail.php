<!--header include-->
<?php include "include/header.php";
include "include/connectivity.php";
$q="select * from detail order by id ASC";
$exe=mysqli_query($conn,$q);


function getCategory($conn,$id){
  $q="select * from category where id='$id'";
  $exe1= mysqli_query($conn,$q);
  $fetch= mysqli_fetch_array($exe1);
  $name= $fetch['name'];
  return $name;
}
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Detail</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
      <a href="insertDetail.php" class="float-right btn btn-primary ">Insert</a>
    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>cat_id</th>
          <th>name</th>
          <th>price</th>
          <th>Image</th>
          <th>Image1</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        <?php while($fetch=mysqli_fetch_array($exe)) { ?>

        <tr class="active">
          <th scope="row" ><?php echo $fetch['id']?></th>
          <td><?php echo getCategory($conn,$fetch['cat_id'])?></td>
          <td><?php echo $fetch['name']?></td>
          <td>Rs. <?php echo $fetch['price']?></td>
          <!--image start-->
          <td><a href="<?php echo $fetch['image'];?>" target="_blank"><img src="<?php echo $fetch['image'];?>" width="100px"></a></td>
          <td><a href="<?php echo $fetch['image1'];?>" target="_blank"><img src="<?php echo $fetch['image1'];?>" width="100px"></a></td>
          <td> <a href="deleteDetail.php?id=<?php echo $fetch['id'];?>" class="btn btn-danger">Delete</a>
           <a href="updateDetail.php?id=<?php echo $fetch['id'];?>" class="btn btn-info">Update</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
   </div>
     <!--include footer-->
  <?php include "include/footer.php";?>