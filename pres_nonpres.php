<!--include header-->
<?php include "include/header.php";
/*start insert querie*/
include "include/connectivity.php";
if(isset($_POST['Submit'])){
  $name=$_POST['name'];
  $gender=$_POST['gender'];
   $address=$_POST['address'];
  $state=$_POST['state_country'];
  $email=$_POST['email'];

   $phone=$_POST['phone'];
   $ref=$_POST['ref'];
  $file = $_FILES['image']['tmp_name'];
  $size = $_FILES['image']['size'];
  $filename = rand(100,2000)."_".$_FILES['image']['name'];
  $location = "images/".$filename;
  $ext = explode('.',$filename);
  $ext = end($ext);
  $ae = array("jpg","JPG","gif","bmp","png","pdf","docx","zip","jfif");

  $desc1=$_POST['desc1'];
  $desc2=$_POST['desc2'];
  $err = [];
  if(!in_array($ext,$ae)){
    $err[0] = "Extension Not allowed";
  }
  if($size>1024000){
    $err[1] = "File must be 100 kb or smaller";
  }/*for error messages*/
  /*$err=$array(); writting error in two ways ek maine uppar likha h ek neeche*/
  if($name=="")
  {
    $err[2]="please enter first name";
  }
  elseif ($name<=3){
    $err[2]="please enter a valid name";
  }
  if($gender=="")
  {
    $err[3]="please enter your gender";
  }
  
  if($address=="")
  {
    $err[4]="please enter your address";
  }
  if($state=="")
  {
    $err[5]="please enter your state/country";
  }
  if($email=="")
  {
    $err[6]="please enter your email";
  }
  elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $err[6]="please enter a valid email";
  }
  
  if($phone=="")
  {
    $err[7]="please enter your phone number";
  }
  elseif ($phone<=13) {
    $err[7]="please enter a valid phone number";
  }
  if($ref=="")
  {
    $err[8]="please enter your reference";
  }
  if(!move_uploaded_file($file, $location)){
    $err[9]="please upload file again";
  }
  /*counting a errors*/
  $c=count($err);
  if($c==0){
    $insert="insert into pres_nonpres(name,gender,address,state_country,email,phone,ref,image,desc1,desc2) values('$name','$gender','$address','$state','$email','$phone','$ref','$location','$desc1','$desc2')";
    //echo $insert;
    $exe= mysqli_query($conn,$insert);
    if($exe){
      echo "<script>alert('one record added');window.location='index.php';</script>";
    
    }
    else
    {
      echo "<script>alert('error');</script>";
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
            <strong class="text-black">Prescription/Non-prescription</strong>
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
            <h2 class="h3 mb-3 text-black">Prescription Refill Form</h2>
             <!--form tag included-->
              <form action="#" method="post" id="register" enctype="multipart/form-data">
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
                <div class="col-md-12">
                  <label for="c_fname" class="text-black">Patient Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_name" name="name" placeholder="Enter First Name"><span><?php echo $err[2];?></span>

                </div>
               <!--  <div class="col-md-6">
                  <label for="c_lname" class="text-black"><span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="lname" placeholder="Enter Last Name"><?php echo $err[1];?>
                </div>
               --></div>

              <!-- <div class="form-group row">
                <label class="text-black">Parent/Guardian Name(Optional)</label><br>
                <div class="col-md-6">
                   
                  <input type="text" class="form-control" id="c_fname" name="fname" placeholder="Enter First Name"><?php echo $err[0];?>

                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="c_lname" name="lname" placeholder="Enter Last Name"><?php echo $err[1];?>
                </div>
              </div> -->
    
              
    
              <!--<div class="form-group row">
                <div class="col-md-12">
                  <label for="c_companyname" class="text-black">Company Name </label>
                  <input type="text" class="form-control" id="c_companyname" name="c_companyname">
                </div>
              </div>-->
               <div class="form-group row">
                <div class="col-md-12">
                  
                  <label for="c_dob" class="text-black">Gender<span class="text-danger">*</span></label><br>
                  <input type="radio" name="gender" value="m">Male
                  <div class="pr-2">
    <input type="radio" name="gender" value="f">Female<span><?php echo $err[3];?></span>
                </div>
              </div>
            </div>
    
    
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <textarea class="form-control" id="c_address" name="address" placeholder="Street address"></textarea><span><?php echo $err[4];?></span>
                </div>
              </div>
    
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="state_country" placeholder="State/Country"><span><?php echo $err[5];?></span>
                </div>
               <!-- <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                </div>-->
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email_address" name="email" placeholder="Enter Email"><span><?php echo $err[6];?></span>
                </div>
              </div>
              <!-- <div class="form-group row">
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
               --><div class="form-group row">
                <div class="col-md-12">
                  <label for="c_phone" class="text-black">Phone no. <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="phone" placeholder="Phone Number"><span><?php echo $err[7];?></span>
                </div>
              </div>
              
              
              
            </div>
          </div>
       
        <!--first form ending-->
          <div class="col-md-6">
    
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Prescription Details</h2>
                               <div class="p-3 p-lg-5 border">

                <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_aphone" class="text-black">Refrence by:</label>
                  <textarea class="form-control" id="c_ref" name="ref" placeholder="Doctor name/Hospital name"></textarea><span><?php echo $err[8];?></span>
                </div>
              </div>
    
    
          
               <div class="form-group">
                  <label class="text-black">Image</label>
                  <div class="col-md-12">
                    <input type="file" name="image" class="form-control"  >
                  </div>
                </div>

             
                <!-- included second form-->
     
                 <div class="form-group row">
                      <div class="col-md-12">
                        <label class="text-black">Medication Detail</label><br>
              <p class="text-black">Please type in your medication along with prescribed dosage information</p>
              <textarea class="form-control" name="desc1"></textarea><br>
              <label class="text-black">Additional Information</label>
              <textarea class="form-control" name="desc2"></textarea><br>
                  <div class="form-group">
                    <input type="Submit" name="Submit" class="btn btn-primary btn-lg btn-block" value="Submit">
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
    </div>

    <div class="site-section bg-secondary bg-image" style="background-image: url('images/bg_2.jpg');">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_1.jpg');">
              <div class="banner-1-inner align-self-center">
                <h2>Pharma Products</h2>
                <p>Medicine is the science and practice of caring for a patient and managing the diagnosis, prognosis, prevention, treatment or palliation of their injury or disease.                 </p>
              </div>
            </a>
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
              <div class="banner-1-inner ml-auto  align-self-center">
                <h2>Rated by Experts</h2>
                <p>Medicine encompasses a variety of health care practices evolved to maintain and restore health by the prevention and treatment of illness.
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