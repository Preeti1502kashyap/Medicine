<!--include header-->
<?php include "include/header.php";
include "include/connectivity.php";
/*insert query validation*/
 
if(isset($_POST['submit'])){
  $fname=trim($_POST['fname']);/*agr naam length se jaada h tou usko trim kr deta h garbage value se issse memory kmm use hoti h*/
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
 
  $message=$_POST['message'];
  

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
  if($email=="")
  {
    $err[2]="please enter your email";
  }
  elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $err[2]="please enter a valid email";
  }
  if($subject=="")
  {
    $err[3]="please enter your subject";
  }
  
  if($message=="")
  {
    $err[4]="please enter a message";
  }
  
  
  /*counting a errors*/
  $c=count($err);
  /*for check a error use these 3 lines*/
  /*print_r($_POST);
  var_dump($err);
  echo $c;*/
  if($c==0)
  {
    $insert="insert into contact(fname,lname,Email,Subject,Message,Created,Status) values('$fname','$lname','$email','$subject','$message',NOW(),'d')";
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
?>


    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Contact</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-5 text-black">Get In Touch</h2>
          </div>
          <div class="col-md-12">
    
            <form action="#" method="post" id="contact">
    
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="fname"><?php echo $err[0];?>
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_lname" name="lname"><?php echo $err[1];?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="email" placeholder=""><?php echo $err[2];?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Subject </label>
                    <input type="text" class="form-control" id="c_subject" name="subject"><?php echo $err[3];?>
                  </div>
                </div>
    
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Message </label>
                    <textarea name="message" id="c_message" cols="30" rows="7" class="form-control"></textarea><?php echo $err[4];?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Send Message">
                  </div>
                </div>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>



    <div class="site-section bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="text-white mb-4">Offices</h2>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">Jalandhar</span>
              <p class="mb-0">215 Dilkhusha Market jalandhar-1</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">Ludhiana</span>
              <p class="mb-0">197 shashtri market Ludhiana</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">Amritsar</span>
              <p class="mb-0">122 Sultan vind Amritsar</p>
            </div>
          </div>
        </div>
      </div>
      
    </div>
<div class="site-section">
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d218045.6814688073!2d75.45371488020885!3d31.359978898205803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sgoogle%20map!5e0!3m2!1sen!2sin!4v1625740739791!5m2!1sen!2sin" width="1600" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
<!--jquery validation start here-->

<!--include footer-->
   <?php include "include/footer.php";?>
<script type="text/javascript" src="jquery.validate.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#contact").validate({
      //rules lyi use krna id
      rules: {
        fname:"required",
        lname:"required",
        email:{
          required:true,
          email:true
        },
        subject:{
          required:true,
          maxlength:30
        },
        message:"required"
      },
      //messages ke liye name use krna 
      messages:{
        fname:"please enter your  first name",
        lname:"please enter your  last name",
        email:{
          required:"please enter email",
          email:"please enter a valid email"
        },
        subject:{
          required:"please enter a subject",
          minlength:"please enter atleast thirty characters"
        },
        message:"please enter your message"
      }

    });
  });
</script>