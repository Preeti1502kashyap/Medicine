<!--header include-->
<?php include "include/header.php";
include "include/connectivity.php";
$q="select * from cart order by id ASC";
$exe=mysqli_query($conn,$q);
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Cart</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Product Id</th>
          <!-- <th>Product Name</th> -->
          <th>Product Quantity</th>
          <th>Product Price</th>
          <th>Name</th>
           <th>Address</th>
            <th>State</th>
             <th>Email</th>
              <th>Phone</th>
               <th>Payment Method</th>
                <th>Order Notes</th>
                <th>Action</th>
        </tr>
      </thead>

      <tbody>
        <?php while($fetch=mysqli_fetch_array($exe)) { ?>

        <tr class="active">
          <th scope="row" ><?php echo $fetch['id']?></th>
          <td><?php echo $fetch['p_id']?></td>
         <!--  <td><?php echo $fetch['p_name']?></td> -->
          <td><?php echo $fetch['p_quantity']?></td>
          <td><?php echo $fetch['p_price']?></td>
          <td><?php echo $fetch['name']?></td>
           <td><?php echo $fetch['address']?></td>
           <td><?php echo $fetch['state']?></td>
            <td><?php echo $fetch['email']?></td>
             <td><?php echo $fetch['phone']?></td>
              <td><?php echo $fetch['payment_method']?></td>
               <td><?php echo $fetch['o_notes']?></td>
          <td> <a href="deleteCart.php?id=<?php echo $fetch['id'];?>" class="btn btn-danger">Delete</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
   </div>
     <!--include footer-->
  <?php include "include/footer.php";?>