<!--header include-->
<?php include "include/header.php";
include "include/connectivity.php";
$q="select * from card order by id ASC";
$exe=mysqli_query($conn,$q);
?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Card Details</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
      <a href="insertCard.php" class="float-right btn btn-primary ">Insert</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Card Number</th>
          <th>Expiry Date</th>
          <th>Amount</th>
          <th>CVV</th>
          <th>Action</th>

        </tr>
      </thead>

      <tbody>
        <?php while($fetch=mysqli_fetch_array($exe)) { ?>

        <tr class="active">
          <th scope="row" ><?php echo $fetch['id']?></th>
          <td><?php echo $fetch['name']?></td>
          <td><?php echo $fetch['card_no']?></td>
          <td><?php echo $fetch['exp']?></td>
          <td><?php echo $fetch['amount']?></td>
          <td><?php echo $fetch['cvv']?></td>
          <td> <a href="deleteCard.php?id=<?php echo $fetch['id'];?>" class="btn btn-danger">Delete</a>
            <a href="updateCard.php?id=<?php echo $fetch['id'];?>" class="btn btn-info">Update</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
   </div>
     <!--include footer-->
  <?php include "include/footer.php";?>