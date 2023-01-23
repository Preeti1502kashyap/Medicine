<!--include header-->
<?php include "include/header.php"; 

if(!isset($_SESSION['email']) )
{
    echo "<script>alert('you must login first');window.location='index.php';</script>";

}
if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  { 
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'     =>  $_GET["id"],
        'item_name'     =>  $_POST["name"],
        'item_price'    =>  $_POST["price"],
        'item_quantity'   =>  $_POST["quantity"],
         'item_image'   =>  $_POST["image"]

      );
      $_SESSION["shopping_cart"][$count] = $item_array;
       
    }
    else
    {
      echo '<script>alert("Item Already Added");</script>';
    }
  }
  else
  {
    $item_array = array(
      'item_id'     =>  $_GET["id"],
      'item_name'     =>  $_POST["name"],
      'item_price'    =>  $_POST["price"],
      'item_quantity'   =>  $_POST["quantity"],
      'item_image'   =>  $_POST["image"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
}

if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
      if($values["item_id"] == $_GET["id"])
      {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="addtocart.php"</script>';
      }
    }
  }
}

?>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> 
            <strong class="text-black">Cart</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                   <?php
      if(!empty($_SESSION["shopping_cart"]))
          {
            $total = 0;$i=1;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {    
          ?>
                  <tr>
                     <td><?php echo $i ?></td>
            <?php 
        $c.=$values["item_id"].",";
        $quantity.=$values["item_quantity"].","; 
                
            
            ?>
                    <td class="product-thumbnail">
                      <img src="<?php echo $values["item_image"]; ?>" alt="Image" class="img-fluid">
                    </td>
                  <!-- <td><?php //echo $values["item_id"]; ?></td> -->
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $values["item_name"]; ?></h2>
                    </td>
                    <td>Rs. <?php echo $values["item_price"]; ?></td>
                    <td>
                      <?php echo $values["item_quantity"]; ?>
                    </td>
                    <td>Rs. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                     <td><a href="addtocart.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="btn btn-danger">Remove</a></td>
          </tr>
          <?php
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
                $i++;
            }
          ?>
          
            </div>
        
            <?php
           
              if(isset($_POST['code']))
              { $coupon=$_POST['coupon'];
               if($coupon=="JSTORE2020")
               {    
                   $total=$total-0.30*$total;
                   
                   echo "<script>alert('code added');</script>";
               }
               else{
                   echo "<script>alert('invalid code');window.loction='addtocart.php';</script>";
               }
                  
              }
              ?>
          </tr>
          <?php
          }
          ?>
         
</table>
         <!--  <tr>
            <td colspan="3" class="float-right">Total</td>
            <td class="float-right">Rs.<?php //echo number_format( $total, 2); ?></td>
            
                    --><!--  <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td> --
                  </tr>
    
                 <!--  <tr>
                    <td class="product-thumbnail">
                      <img src="images/product_01.png" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">Bioderma</h2>
                    </td>
                    <td>$49.00</td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" value="1" placeholder=""
                          aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>
    
                    </td>
                    <td>$49.00</td>
                    <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </form>
        </div>
    
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <!-- <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-md btn-block">Update Cart</button>
              </div> -->
              <div class="col-md-6">
                <button class="btn btn-outline-primary btn-md btn-block"><a href="shop.php">Continue Shopping</a></button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-md px-4">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">Rs.<?php echo number_format( $total, 2); ?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">Rs.<?php echo number_format( $total, 2); ?></strong>
                  </div>
                </div>
 <!--     <a href="order.php?products=<?php echo $c ?>&quantity=<?php echo $quantity ?>&total=<?php echo $total ?>" class="btn btn-primary ">Buy</a>  -->
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.php?products=<?php echo $c ?>&quantity=<?php echo $quantity ?>&total=<?php echo $total ?>'">Proceed To
                      Checkout</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-secondary bg-image" style="background-image: url('images/bg_2.jpg');">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_1.jpg');">
              <div class="banner-1-inner align-self-center">
                <h2>Pharma Products</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                </p>
              </div>
            </a>
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
              <div class="banner-1-inner ml-auto  align-self-center">
                <h2>Rated by Experts</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                </p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
<!--include footer-->
<?php include "include/footer.php";?>
   