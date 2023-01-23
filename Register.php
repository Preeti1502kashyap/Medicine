<!--include header-->
<?php include "include/header.php";
/*start insert querie*/
include "include/connectivity.php";
if(isset($_POST['Submit'])){
  $fname=trim($_POST['fname']);/*agr naam length se jaada h tou usko trim kr deta h garbage value se issse memory kmm use hoti h*/
  $lname=$_POST['lname'];
  $address=$_POST['Address'];
  $state=$_POST['State'];
  $email=$_POST['Email'];
  $password=$_POST['Password'];/*agr password ko hide krna h database mein ya phir frontend pe md5 use krna h isse password show nhi hundi aa*/
  // $cpassword=$_POST['cpassword'];
  $phone=$_POST['Phone'];
  
  $err=[];/*for error messages*/
  /*$err=$array(); writting error in two ways ek maine uppar likha h ek neeche*/
  if($fname=="")
  {
    $err[0]="please enter first name";
  }
  elseif (strlen($fname)<=3){
    $err[0]="please enter a valid name";
  }
  if($lname=="")
  {
    $err[1]="please enter your lastname";
  }
  elseif (strlen($lname)<=3){
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
  // elseif($cpassword!=$password)
  // {
  //   $err[5]="please enter a valid password";
  // }
  if($phone=="")
  {
    $err[6]="please enter your phone number";
  }
  elseif (strlen($phone)>10) {
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
if(isset($_POST['login'])){
  $lemail=$_POST['lemail'];
  $lpassword=$_POST['lpassword'];

  $err1=[];/*for error messages*/
  /*$err=$array(); writting error in two ways ek maine uppar likha h ek neeche*/
  if($lemail=="")
  {
    $err1[0]="please enter your email";
  }
  /*elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $err[0]="please enter a valid email";
  }*/
  if($lpassword=="")
  {
    $err1[1]="please enter a password";
  }
  
  
  /*counting a errors*/
  $c=count($err1);
  // print_r($_POST);
  // var_dump($err);
  // echo $c;
  if($c==0)

  {
    $select="select * from register where Email='$lemail'and Password='$lpassword'";
    $exe= mysqli_query($conn,$select);
    $num=mysqli_num_rows($exe);
    if($num==1){
      $fetch=mysqli_fetch_array($exe);
      $_SESSION['email']=$lemail;
      $_SESSION['fname']=$fetch['fname'];
      $_SESSION['id']=$fetch['id'];
        $id= $fetch['id'];
      echo "<script>alert('successfully login');window.location='index.php';</script>";
    
    }
    
  
}
}

?>
<style type="text/css">
  span{color:red;}
</style>

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
              <form action="" method="post" id="register">
            <div class="p-3 p-lg-5 border">
                       
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
       
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="Address" placeholder="Street address"><?php echo $err[2];?>
                </div>
              </div>
    
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="State" placeholder="State/Country"><?php echo $err[3];?>
                </div>
               <!-- <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                </div>-->
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email_address" name="Email" placeholder="Enter Email"><?php echo $err[4];?>
                </div>
              </div>
              <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_companyname" class="text-black">Password</label>
                        <input type="password" class="form-control" id="password" name="Password" placeholder="Enter Password"><?php echo $err[5];?>
                      </div>
              </div>
              <!-- <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_companyname" class="text-black">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter Confirm Password">
                      </div>
              </div> -->
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="Phone" placeholder="Phone Number"><?php echo $err[6];?>
                </div>
              </div>

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
                        <input type="text" class="form-control" id="c_diff_companyname" name="lemail" placeholder="Enter Email or phone number"><span><?php echo $err1[0];?></span>
                      </div>
                    </div>
         <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_companyname" class="text-black">Password</label>
                        <input type="password" class="form-control" id="c_diff_companyname" name="lpassword" placeholder="Enter Password"><span><?php echo $err1[1];?></span>
                      </div>
        </div>
      <div class="row mb-5">
          <div class="col-md-12">
            <div class="bg-light rounded p-1">
              <p class="mb-0"><a href="changepassword.php" class="d-inline-block">Change Password?</a></p>
            </div>
          </div>
        </div>
                    <div class="form-group">
                    <input type="Submit" name="login" class="btn btn-primary btn-lg btn-block" value="Login">
                  </div>
    
                </div>
              </div>
            </div>
    
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
                <p>Medicine is the science and practice of caring for a patient and managing the diagnosis, prognosis, prevention, treatment or palliation of their injury or disease. 
                </p>
              </div>
            </a>
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
              <div class="banner-1-inner ml-auto  align-self-center">
                <h2>Rated by Experts</h2>
                <p>Medicine encompasses a variety of health care practices evolved to maintain and restore health by the prevention and treatment of illness.                </p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
<!--include jquery validation-->

<!--include footer-->
   <?php include "include/footer.php";?>
   <script type="text/javascript" src="jquery.validate.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#register").validate({
      //rules lyi use krna id
      rules: {
        fname:"required",
        lname:"required",
        address:"required",
        state_country:"required",
        email:{
          required:true,
          email:true
        },
        password:{
          required:true,
          minlength:8
        },
        cpassword:{
          required:true,
          minlength:8,
          equalTo:"#password"
        },
        phone:{
          required:true,
          maxlength:13
        }
      },
      //messages ke liye name use krna 
      messages:{
        fname:"please enter your first name",
        lname:"please enter your last name",
        address:"please enter your address",
        state_country:"please enter your state",
        email:{
          required:"please enter email",
          email:"please enter a valid email"
        },
        password:{
          required:"please enter a password",
          minlength:"please enter atleast eight characters"
        },
        cpassword:{
          required:"please enter a confirm password",
          minlength:"please enter atleast eight characters",
          equalTo:"please enter a same password as above"
        },
        phone:{
          required:"please enter your phone",
          maxlength:"please enter atleast thirteen digits"
        }
      }

    });
  });
</script>