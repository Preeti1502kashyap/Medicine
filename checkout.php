<!--include header-->
<?php include "include/header.php";
$email=$_SESSION['email'];
$select= "select* from register where email='$email'";
$result=mysqli_query($conn,$select);
$row=mysqli_fetch_array($result);


$products=$_GET['products'];
    $quantity=$_GET['quantity'];
    $total=$_GET['total'];
$regid=$_SESSION['id'];

if(isset($_POST['porder'])){
   
    $name=$_POST['c_name'];
    $address=$_POST['c_address'];
    $state=$_POST['c_state'];
    $email=$_POST['c_email'];

    $phone=$_POST['c_phone'];
      $onotes=$_POST['c_onotes'];
        
     $payment=$_POST['radio'];
   
    $err=[];
      if($name==""){
            $err[0]= "please enter your name";
        }
      if($address==""){
            $err[1]= "please enter your address";
        }
      if($state==""){
            $err[2]= "please enter your state";
        }
      if($email==""){
            $err[3]= "please enter your email";
        }
      if($phone==""){
            $err[4]= "please choose payment method";
        }
        if($onotes==""){
            $err[5]= "please enter your notes";
        }
        if($payment=="")
        {
          $err[6]="please choose payment method";
        }
      
    if($payment=="cash")
    {
        $insert="insert into cart(p_id,p_quantity,p_price,name,address,state,email,phone,payment_method,o_notes) values('$products','$quantity','$total','$name','$address','$state','$email','$phone','$payment','$onotes')";
        echo $insert;
        $result=mysqli_query($conn,$insert);
        if($result)
        {
            echo "<script>alert('order placed successfully');window.location='index.php';</script>";
        }
        
    }
    else{
        $selectc="select * from card";
        $resultc=mysqli_query($conn,$selectc);
        $ncard=$_POST['ncard'];
        $cnumber=$_POST['cnumber'];
        $cvv=$_POST['cvv'];
        $expiry=$_POST['expiry'];
        
        $row=mysqli_fetch_array($resultc);
        if($ncard==$row['name'] && $cnumber==$row['card_no'] && $cvv==$row['cvv'] && $expiry==$row['exp']){
          $insert1="insert into cart(p_id,p_quantity,p_price,name,address,state,email,phone,payment_method,o_notes) values('$products','$quantity','$total','$name','$address','$state','$email','$phone','$payment','$onotes')";
        //echo $insert1;
        $result=mysqli_query($conn,$insert1);
             if($result)
        {
            echo "<script>alert('order placed successfully');window.location='index.php';</script>";
        
   
            $amount=$row['amount'];
            $amount1= $amount-$total;
            $update="update card set amount='$amount1'";
            $updateresult=mysqli_query($conn,$update);
            
          echo "<script>alert('Thankyou for placing an order from us...!!!');window.location.href='shop.php';</script>";
            
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
            <strong class="text-black">Checkout</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="bg-light rounded p-3">
              <p class="mb-0">Returning customer? <a href="#" class="d-inline-block">Click here</a> to login</p>
            </div>
          </div>
        </div>
        <form method="post">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_fname" class="text-black">Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="c_name">
                </div>
                
              </div>
    
              
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Street address">
                </div>
              </div>
    
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="c_state">
                </div>
              </div>
    
              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="c_email">
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
                </div>
              </div>
    
              <div class="form-group">
                <label for="c_order_notes" class="text-black">Order Notes</label>
                <textarea name="c_onotes" id="c_order_notes" cols="30" rows="5" class="form-control"
                  placeholder="Write your notes here..."></textarea>
              </div>
    
            </div>
          </div>
          <div class="col-md-6">
    
            <!-- <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                <div class="p-3 p-lg-5 border">
    
                  <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                  <div class="input-group w-75">
                    <input type="text" class="form-control" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code"
                      aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-sm px-4" type="button" id="button-addon2">Apply</button>
                    </div>
                  </div>
    
                </div>
              </div>
            </div>
     -->
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Payment Mode:</h2>
                <div class="p-3 p-lg-3 border">
                  <div class="form-group ml-5 mr-5">
      <label for="" style="color:white">Payment Method</label><br>
    <div class="custom-control custom-radio custom-control-inline ">
  <input type="radio" class="custom-control-input form-control mr-1" id="customRadio1" name="radio"  value="cash" >
  
  <label class="custom-control-label  mr-2" for="customRadio1"style="font-size:15px;color:black">Cash on Delivery</label>
</div>
<br>
                <div class="custom-control custom-radio custom-control-inline " >
  <input type="radio" class="custom-control-input form-control" id="customRadio2" name="radio" value="online">
  
  <label class="custom-control-label " for="customRadio2"style="font-size:15px;color:black" >Online</label>
  </div>
   <span style="color:red"><?php echo $err[4]; ?></span>
  </div>
  <div style="display:none" id="online">
      <div class="form-group ml-5 mr-5">
   <i class="fa fa-envelope" style="font-size: 25px;color:white"></i>
    <label for="" style="color:white">Name on Card</label>
    <input type="text" class="form-control" title="enter email " placeholder="enter name on card" pattern="[A-Za-z][A-Za-z\s]{2,20}" name="ncard" >
  </div>
       <div class="form-group ml-5 mr-5">
   <i class="fa fa-envelope" style="font-size: 25px;color:white"></i>
    <label for="" style="color:white">Card Number</label>
    <input type="text" class="form-control"  title="enter 16 digit card number "pattern="[789][0-9]{15}" placeholder="enter card number"  name="cnumber" >
  </div>
     
      <div class="form-group ml-5 mr-5">
   <i class="fa fa-envelope" style="font-size: 25px;color:white"></i>
    <label for="" style="color:white">CVV</label>
    <input type="text" class="form-control" pattern="[0-9]{3}" title="enter cvv" placeholder="enter CVV number"  name="cvv" >
  </div>
     
        <div class="form-group ml-5 mr-5">
   <i class="fa fa-calendar" style="font-size: 25px;color:white"></i>
     <label for="bdaymonth" style="color:white">Expiry(month and year):</label>
  <input type="text" name="expiry" class="form-control">
  </div>
  
                    </div>
                  </div>
    
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="porder">Place Order</button>
                  </div>
    </div>
  </div>
</div>
</div>
</form>
                </div>
              </div>
            </div>
    
          </div>
        </div>
        <!-- </form> -->
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
    <script>
   $(document).ready(function(){
      $('#customRadio2').click(function(){
        $('#online').show(function(){
            $('#customRadio1').click(function(){
              $('#online').hide();  
            });
          });

 });
    });
</script>