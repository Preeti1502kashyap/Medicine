<!--include header-->
<?php include "include/header.php";
$q= "select * from detail order by rand() limit 0,6";

$exe= mysqli_query($conn,$q);

?>



    <!-- <div class="site-blocks-cover" style="background-image: url('images/hero_1.jpg');">

      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
              <h1>Welcome To Pharma</h1>
              <p>
                <a href="shop.php" class="btn btn-primary px-5 py-3">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
 -->
 <style type="text/css">
   .carousel-caption {
    margin-left: 20%;
}
 </style>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/hero_1.jpg" alt="Los Angeles" width="1600" height="600">
       <div class="carousel-caption">

      
        <div class="row">
          <div class="col-lg-7 mb-5 order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
              <h1>Welcome To Pharma</h1>
              <p>
                <a href="shop.php" class="btn btn-primary px-5 py-3">Shop Now</a>
              </p>
            
          </div>
        </div>
      </div>
    </div>   
          
      
    </div>
    <div class="carousel-item">
      <img src="images/bg_2.jpg" alt="Chicago" width="1600" height="600">
      <div class="carousel-caption">

      
        <div class="row">
          <div class="col-lg-7 mb-5 order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
              <h1>Welcome To Pharma</h1>
              <p>
                <a href="shop.php" class="btn btn-primary px-5 py-3">Shop Now</a>
              </p>
            
          </div>
        </div>
      </div>
    </div></div>
    <div class="carousel-item">
      <img src="images/bg_1.jpg" alt="New York" width="1600" height="600">
            <div class="carousel-caption">

      
        <div class="row">
          <div class="col-lg-7 mb-5 order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
              <h1>Welcome To Pharma</h1>
              <p>
                <a href="shop.php" class="btn btn-primary px-5 py-3">Shop Now</a>
              </p>
            
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
    <div class="site-section">
      <div class="container">
        <div class="row align-items-stretch section-overlap">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-primary h-100">
              <a href="faq.php" class="h-100">
                <h5>FAQ</h5>
                <p>
                  Amet sit amet dolor
                  <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                </p>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap h-100">
              <a href="#" class="h-100">
                <h5>Sale 50% Off</h5>
                <p>For more visited customer</p>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-warning h-100">
              <a href="gift.php" class="h-100">
                <h5>Buy <br> A Gift Card</h5>
                <p>
                  Amet sit amet dolor
                  <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                </p>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Popular Products</h2>
          </div>
        </div>

        <div class="row">
          <?php  
            while($fetch=mysqli_fetch_array($exe))
            {
              ?>
          <div class="col-sm-5 col-lg-3 text-center item mb-4">
            <!-- <span class="tag">Sale</span>
 -->            <a href="shop-single.php?id=<?php echo $fetch['id'] ?>"> <img src="admin/<?php echo $fetch['image'] ?>" alt="Image"></a>
            <h3 class="text-dark"><a href="shop-single.php"><?php echo ucwords($fetch['name']);?></a></h3>
            <p class="price bg-warning text-white"> <!-- <del>95.00</del> &mdash; --> Rs. <?php echo $fetch['price']?></p>
          </div>
        <?php }  ?>
          <!-- <div class="col-sm-6 col-lg-4 text-center item mb-4">
            <a href="shop-single.html"> <img src="images/product_02.png" alt="Image"></a>
            <h3 class="text-dark"><a href="shop-single.html">Chanca Piedra</a></h3>
            <p class="price">$70.00</p>
          </div>
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
            <a href="shop-single.html"> <img src="images/product_03.png" alt="Image"></a>
            <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>
            <p class="price">$120.00</p>
          </div>

          <div class="col-sm-6 col-lg-4 text-center item mb-4">

            <a href="shop-single.html"> <img src="images/product_04.png" alt="Image"></a>
            <h3 class="text-dark"><a href="shop-single.html">Cetyl Pure</a></h3>
            <p class="price"><del>45.00</del> &mdash; $20.00</p>
          </div>
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
            <a href="shop-single.html"> <img src="images/product_05.png" alt="Image"></a>
            <h3 class="text-dark"><a href="shop-single.html">CLA Core</a></h3>
            <p class="price">$38.00</p>
          </div>
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
            <span class="tag">Sale</span>
            <a href="shop-single.html"> <img src="images/product_06.png" alt="Image"></a>
            <h3 class="text-dark"><a href="shop-single.html">Poo Pourri</a></h3>
            <p class="price"><del>$89</del> &mdash; $38.00</p>
          </div>
         --></div>
        <div class="row mt-5">
          <div class="col-12 text-center">
            <a href="shop.php" class="btn btn-primary px-4 py-3">View All Products</a>
          </div>
        </div>
      </div>
    </div>

    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">New Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
 <?php  $q1="select * from detail order by id DESC";
          $exe1= mysqli_query($conn,$q1);
            while($fetch=mysqli_fetch_array($exe1))
            { ?>
              <div class="text-center item mb-4">
                <a href="shop-single.php?id=<?php echo $fetch['id'] ?>"> <img src="admin/<?php echo $fetch['image']?>" alt="Image"></a>
                <h3 class="text-dark"><a href="shop-single.php?id=<?php echo $fetch['id'] ?>"><?php echo ucwords($fetch['name']); ?></a></h3>
                <p class="price bg-warning text-white" >Rs. <?php echo $fetch['price']?></p>
              </div><?php } ?>
<!-- 
              <div class="text-center item mb-4">
                <a href="shop-single.html"> <img src="images/product_01.png" alt="Image"></a>
                <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>
                <p class="price">$120.00</p>
              </div>

              <div class="text-center item mb-4">
                <a href="shop-single.html"> <img src="images/product_02.png" alt="Image"></a>
                <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>
                <p class="price">$120.00</p>
              </div>

              <div class="text-center item mb-4">
                <a href="shop-single.html"> <img src="images/product_04.png" alt="Image"></a>
                <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>
                <p class="price">$120.00</p>
              </div> -->

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Testimonials</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 no-direction owl-carousel">
        <?php $q2="select * from feedback order by id ASC";
        $exe2= mysqli_query($conn,$q2);
        while ($fetch=mysqli_fetch_array($exe2)) {
        ?>  
        
              <div class="testimony">
                <blockquote>
                  <img src="images/download.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p><?php echo ucwords($fetch['name']) ?></p>
                  <!-- <p><?php echo ucwords($fetch['Email']) ?></p> -->
                  <p><?php echo ucwords($fetch['Message']) ?></p>
                </blockquote>

                <p>&mdash;<?php echo ucwords($fetch['name']) ?> </p>

              </div>
        <?php } ?>
              <!--<div class="testimony">
                <blockquote>
                  <img src="images/person_2.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>
              
                <p>&mdash; Rebecca Morando</p>
              </div>
        
              <div class="testimony">
                <blockquote>
                  <img src="images/person_3.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>
              
                <p>&mdash; Lucas Gallone</p>
              </div>
        
              <div class="testimony">
                <blockquote>
                  <img src="images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>
              
                <p>&mdash; Andrew Neel</p>
              </div>
         -->
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
                <p>Medicine is the science and practice of caring for a patient and managing the diagnosis, prognosis, prevention, treatment or palliation of their injury or disease.</p>
              </div>
            </a>
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
              <div class="banner-1-inner ml-auto  align-self-center">
                <h2>Rated by Experts</h2>
                <p> Medicine encompasses a variety of health care practices evolved to maintain and restore health by the prevention and treatment of illness. 
                </p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

<!--include footer-->
   <?php include "include/footer.php";?>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>