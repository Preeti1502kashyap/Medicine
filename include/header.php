<?php session_start();
include "include/connectivity.php";
  $cur=$_SERVER['PHP_SELF'];
$curr=explode('/',$cur);
$cur=end($curr);
?>
<!DOCTYPE html>
<html>

<head>
  <title>online medicine store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" type="text/css" href="css/xzoom.css" media="all" /> 
</head>

<body>

  <div class="site-wrap">


    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.php" class="js-logo-clone">HP</a>
              <b class="text-black">Medicine Store</b>
            </div>

          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li <?php if($cur=='index.php') echo "class='active'" ?>><a href="index.php">Home</a></li>
                <li <?php if($cur=='shop.php') echo "class='active'" ?>><a href="shop.php">Store</a></li>
                <li class="has-children">
                  <a href="#">Medicine</a>
                  <ul class="dropdown">
                    <?php $q= "select * from category";
                    $exe1= mysqli_query($conn,$q);
                    while($fet= mysqli_fetch_array($exe1)){ ?>
                    <li ><a href="shop1.php?id=<?php echo $fet['id'] ?>"><?php  echo $fet['name']?></a></li>
                  <?php } ?>
                 
                    
                  </ul>
                </li>
                <li <?php if($cur=='about.php') echo "class='active'" ?>><a href="about.php">About</a></li>
                <li <?php if($cur=='contact.php') echo "class='active'" ?>><a href="contact.php">Contact</a></li>
                <!--<li><a href="Register.php">Register</a></li>-->

                <!--to show a person profile who is login-->
                <?php if(!isset($_SESSION['email'])){ ?>
                <li <?php if($cur=='Register.php') echo "class='active'" ?>><a href="Register.php">Register</a></li>
              <?php } else { ?>
               
                
                <li class="has-children">
                  <a href="#" class="btn btn-info"><?php echo ucfirst($_SESSION['fname']); ?></a>
                  <ul class="dropdown">
                    <li><a href="changepassword.php">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                   
    
                    
                  </ul>
                </li>
<?php } ?>
            <li <?php if($cur=='pres_nonpres.php') echo "class='active'" ?>><a href="pres_nonpres.php">Prescription</a></li>
               </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="addtocart.php" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">2</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>