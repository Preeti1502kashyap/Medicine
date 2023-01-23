<!--include header-->
<?php include "include/header.php";
/*start insert querie*/
include "include/connectivity.php";
if(isset($_POST['Submit'])){
  $fname=trim($_POST['fname']);/*agr naam length se jaada h tou usko trim kr deta h garbage value se issse memory kmm use hoti h*/
  $lname=$_POST['lname'];
   $address=$_POST['address'];
  $state=$_POST['state_country'];
  $email=$_POST['email'];
  $password=$_POST['password'];/*agr password ko hide krna h database mein ya phir frontend pe md5 use krna h isse password show nhi hundi aa*/
  $cpassword=$_POST['cpassword'];
   $phone=$_POST['phone'];
  
  $err=[];/*for error messages*/
  /*$err=$array(); writting error in two ways ek maine uppar likha h ek neeche*/
  if($fname=="")
  {
    $err[0]="please enter first name";
  }
  elseif ($fname<=3){
    $err[0]="please enter a valid name";
  }
  if($lname=="")
  {
    $err[1]="please enter your lastname";
  }
  elseif ($lname<=3){
    $err[1]="please enter a valid name";
  }
  if($address=="")
  {
    $err[2]="please enter your address";
  }
  if($state=="")
  {
    $err[3]="please enter your state/country";
  }
  if($email=="")
  {
    $err[4]="please enter your email";
  }
  elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $err[4]="please enter a valid email";
  }
  if($password=="")
  {
    $err[5]="please enter a password";
  }
  elseif($cpassword!=$password)
  {
    $err[5]="please enter a valid password";
  }
  if($phone=="")
  {
    $err[6]="please enter your phone number";
  }
  elseif ($phone<=13) {
    $err[6]="please enter a valid phone number";
  }
  
  /*counting a errors*/
  $c=count($err);
  if($c==0){
    $insert="insert into register(fname,lname,Address,State,Email,Password,Phone,Created,Status) values('$fname','$lname','$address','$state','$email','$password','$phone',NOW(),'d')";
    //echo $insert;
    $exe= mysqli_query($conn,$insert);
    if($exe){
      echo "<script>alert('one record added');</script>";
    
    }
    else
    {
      echo "<script>alert('error');</script>";
    }
  }
  
}
/*include login query or form*/
if(isset($_POST['Submit'])){
  $email=$_POST['email'];
  $password=$_POST['password'];

  $err=[];/*for error messages*/
  /*$err=$array(); writting error in two ways ek maine uppar likha h ek neeche*/
  if($email=="")
  {
    $err[0]="please enter your email";
  }
  /*elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $err[0]="please enter a valid email";
  }*/
  if($password=="")
  {
    $err[1]="please enter a password";
  }
  
  
  /*counting a errors*/
  $c=count($err);
  // print_r($_POST);
  // var_dump($err);
  // echo $c;
  if($c==0)

  {
    $select="select * from register where Email='$email' or Phone='$email' and Password='$password'";
    $exe= mysqli_query($conn,$select);
    $num=mysqli_num_rows($exe);
    if($num==1){
      $fetch=mysqli_fetch_array($exe);
      $_SESSION['email']=$email;
      $_SESSION['fname']=$fetch['fname'];
      $_SESSION['id']=$fetch['id'];
        $id= $fetch['id'];
      echo "<script>alert('successfully login');window.location='index.php';</script>";
    
    }
    
  
}
}

?>


    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Register/Login</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <!--<div class="row mb-5">
          <div class="col-md-12">
            <div class="bg-light rounded p-3">
              <p class="mb-0">Returning customer? <a href="#" class="d-inline-block">Click here</a> to login</p>
            </div>
          </div>
        </div>-->

        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">New Registration</h2>
             <!--form tag included-->
              <form action="#" method="post" id="register">
            <div class="p-3 p-lg-5 border">
              <!--<div class="form-group">
                <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
                <select id="c_country" class="form-control">
                  <option value="1">Select a country</option>
                  <option value="2">bangladesh</option>
                  <option value="3">Algeria</option>
                  <option value="4">Afghanistan</option>
                  <option value="5">Ghana</option>
                  <option value="6">Albania</option>
                  <option value="7">Bahrain</option>
                  <option value="8">Colombia</option>
                  <option value="9">Dominican Republic</option>
                </select>
              </div>-->
             
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="fname" placeholder="Enter First Name"><?php echo $err[0];?>
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="lname" placeholder="Enter Last Name"><?php echo $err[1];?>
                </div>
              </div>
    
              <!--<div class="form-group row">
                <div class="col-md-12">
                  <label for="c_companyname" class="text-black">Company Name </label>
                  <input type="text" class="form-control" id="c_companyname" name="c_companyname">
                </div>
              </div>-->
    
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="address" placeholder="Street address"><?php echo $err[2];?>
                </div>
              </div>
    
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="state_country" placeholder="State/Country"><?php echo $err[3];?>
                </div>
               <!-- <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                </div>-->
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email_address" name="email" placeholder="Enter Email"><?php echo $err[4];?>
                </div>
              </div>
              <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_companyname" class="text-black">Password</label>
                        <input type="password" class="form-control" id="c_diff_companyname" name="password" placeholder="Enter Password"><?php echo $err[5];?>
                      </div>
              </div>
              <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_companyname" class="text-black">Confirm Password</label>
                        <input type="password" class="form-control" id="c_diff_companyname" name="cpassword" placeholder="Enter Confirm Password">
                      </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="phone" placeholder="Phone Number"><?php echo $err[6];?>
                </div>
              </div>
    
             <!-- <div class="form-group">
                <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account"
                  role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1"
                    id="c_create_account"> Create an account?</label>
                <div class="collapse" id="create_an_account">
                  <div class="py-2">
                    <p class="mb-3">Create an account by entering the information below. If you are a returning customer
                      please login at the top of the page.</p>
                    <div class="form-group">
                      <label for="c_account_password" class="text-black">Account Password</label>
                      <input type="email" class="form-control" id="c_account_password" name="c_account_password"
                        placeholder="">
                    </div>
                  </div>
                </div>
              </div>-->
    
    
              <!--<div class="form-group">
                <label for="c_ship_different_address" class="text-black" data-toggle="collapse"
                  href="#ship_different_address" role="button" aria-expanded="false"
                  aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address">
                  Ship To A Different Address?</label>
                <div class="collapse" id="ship_different_address">
                  <div class="py-2">-->
    
                   <!--  <div class="form-group">
                      <label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
                      <select id="c_diff_country" class="form-control">
                        <option value="1">Select a country</option>
                        <option value="2">bangladesh</option>
                        <option value="3">Algeria</option>
                        <option value="4">Afghanistan</option>
                        <option value="5">Ghana</option>
                        <option value="6">Albania</option>
                        <option value="7">Bahrain</option>
                        <option value="8">Colombia</option>
                        <option value="9">Dominican Republic</option>
                      </select>
                    </div> -->
    
    
                    <!--<div class="form-group row">
                      <div class="col-md-6">
                        <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
                      </div>
                    </div>
    
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_companyname" class="text-black">Company Name </label>
                        <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
                      </div>
                    </div>
    
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_address" name="c_diff_address"
                          placeholder="Street address">
                      </div>
                    </div>
    
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                    </div>
    
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="c_diff_state_country" class="text-black">State / Country <span
                            class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span
                            class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
                      </div>
                    </div>
    
                    <div class="form-group row mb-5">
                      <div class="col-md-6">
                        <label for="c_diff_email_address" class="text-black">Email Address <span
                            class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone"
                          placeholder="Phone Number">
                      </div>
                    </div>
    
                  </div>
    
                </div>
              </div>-->
    
              <!-- <div class="form-group">
                <label for="c_order_notes" class="text-black">Order Notes</label>
                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                  placeholder="Write your notes here..."></textarea>
              </div> -->
                  <div class="form-group">
                    <input type="Submit" name="Submit" class="btn btn-primary btn-lg btn-block" value="Submit">
                  </div>
              
              
            </div>
          </div>
        </form>
        <!--first form ending-->
          <div class="col-md-6">
    
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Registered Users</h2>
                <!-- included second form-->
                <form action="#" method="post">
                <div class="p-3 p-lg-5 border">
    
                 <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_companyname" class="text-black">Email</label>
                        <input type="text" class="form-control" id="c_diff_companyname" name="email" placeholder="Enter Email or phone number"><?php echo $err[0];?>
                      </div>
                    </div>
         <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_companyname" class="text-black">Password</label>
                        <input type="password" class="form-control" id="c_diff_companyname" name="password" placeholder="Enter Password"><?php echo $err[1];?>
                      </div>
        </div>
      <div class="row mb-5">
          <div class="col-md-12">
            <div class="bg-light rounded p-1">
              <p class="mb-0"><a href="Forgot.php" class="d-inline-block"> Forgot Password?</a></p>
            </div>
          </div>
        </div>
                    <div class="form-group">
                    <input type="Submit" name="Submit" class="btn btn-primary btn-lg btn-block" value="Login">
                  </div>
    
                </div>
              </div>
            </div>
    
           <!--  <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Bioderma <strong class="mx-2">x</strong> 1</td>
                        <td>$55.00</td>
                      </tr>
                      <tr>
                        <td>Ibuprofeen <strong class="mx-2">x</strong> 1</td>
                        <td>$45.00</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                        <td class="text-black">$350.00</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>$350.00</strong></td>
                      </tr>
                    </tbody>
                  </table>
    
                  <div class="border mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button"
                        aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>
    
                    <div class="collapse" id="collapsebank">
                      <div class="py-2 px-4">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                          payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>
    
                  <div class="border mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button"
                        aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>
    
                    <div class="collapse" id="collapsecheque">
                      <div class="py-2 px-4">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                          payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>
    
                  <div class="border mb-5">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button"
                        aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>
    
                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2 px-4">
                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                          payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                      </div>
                    </div>
                  </div>
    
                  <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='thankyou.php'">Place
                      Order</button>
                  </div>
    
                </div>
              </div>
            </div> -->
    
          </div>
        </div>
        <!--ending second form-->
        </form>
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
<!--include jquery validation-->
<script type="text/javascript" src="jquery.validate.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#register").validate({
      //rules lyi use krna id
      rules: {
        fname:"required",
        lname:"required",
        Address:"required",
        State:"required",
        Email:{
          required:true,
          email:true
        },
        Password:{
          required:true,
          minlength:8
        },
        cpassword:{
          required:true,
          minlength:8,
          equalTo:"#password"
        },
        Phone:{
          required:true,
          maxlength:13
        }
      },
      //messages ke liye name use krna 
      messages:{
        fname:"please enter your first name",
        lname:"please enter your last name",
        Address:"please enter your address",
        State:"please enter your state",
        Email:{
          required:"please enter email",
          email:"please enter a valid email"
        },
        Password:{
          required:"please enter a password",
          minlength:"please enter atleast eight characters"
        },
        cpassword:{
          required:"confirm password",
          minlength:"please enter atleast eight characters",
          equalTo:"please enter a same password as above"
        },
        Phone:{
          required:"please enter your phone",
          maxlength:"please enter atleast thirteen digits"
        }
      }

    });
  });
</script>
<!--include footer-->
   <?php include "include/footer.php";?>