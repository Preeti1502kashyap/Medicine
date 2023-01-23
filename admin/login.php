<!-- login form include-->
   <?php session_start();
   include "include/connectivity.php";
   if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $password=$_POST['password'];

  $err=[];/*for error messages*/
  /*$err=$array(); writting error in two ways ek maine uppar likha h ek neeche*/
  if($email=="")
  {
    $err[0]="please enter your email";
  }
  elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $err[0]="please enter a valid email";
  }
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
    $select="select * from admin where email='$email' and password='$password'";
    $exe= mysqli_query($conn,$select);
    $num=mysqli_num_rows($exe);
    if($num==1){
      $fetch=mysqli_fetch_array($exe);
      $_SESSION['aemail']=$email;
      //$_SESSION['fname']=$fetch['fname'];
        
      echo "<script>alert('successfully login');window.location='index.php';</script>";
    
    }
    
  
}
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body id="login">
  <div class="login-logo">
    <a href="index.html"><img src="images/medicine.jpg" alt=""/></a>
  </div>
  <h2 class="form-heading">login</h2>
  <div class="app-cam">
	  <form method="post">
		<input type="text"  name="email" class="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}"><?php echo $err[0];?>
		<input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><?php echo $err[1];?>
		<div class="submit"><input type="submit"  name="submit" onclick="myFunction()" value="Login"></div>
		<!--<div class="login-social-link">
          <a href="index.html" class="facebook">
              Facebook
          </a>
          <a href="index.html" class="twitter">
              Twitter
          </a>
        </div>-->
		<ul class="new">
			<li class="new_left"><p><a href="#">Forgot Password ?</a></p></li>
			<li class="new_right"><p class="sign">New here ?<a href="register.html"> Sign Up</a></p></li>
			<div class="clearfix"></div>
		</ul>
	</form>
  </div>
   <!-- <div class="copy_layout login">
      <p>Copyright &copy; 2015 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
   </div> -->
   </body>
</html>
