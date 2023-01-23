 <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p>Medicine is the science and practice of caring for a patient and managing the diagnosis, prognosis, prevention, treatment or palliation of their injury or disease. Medicine encompasses a variety of health care practices evolved to maintain and restore health by the prevention and treatment of illness. </p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Quick Links</h3>
            <ul class="list-unstyled">

              <?php $q= "select * from category";
                    $exe1= mysqli_query($conn,$q);
                    while($fet= mysqli_fetch_array($exe1)){ ?>
                    <li><a href="shop1.php?id=<?php echo $fet['id'] ?>"><?php  echo $fet['name']?></a></li>
                  <?php } ?>
                  <li><a href="feedback.php">Feedback</a></li>
             <!--  <li><a href="#">Supplements</a></li>
              <li><a href="#">Vitamins</a></li>
              <li><a href="#">Diet &amp; Nutrition</a></li>
              <li><a href="#">Tea &amp; Coffee</a></li>
  -->           </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Sector-16 near Bus stand Chandigarh</li>
                <li class="phone"><a href="tel://23923929210">118-332-4567</a></li>
                <li class="email">hpmedicine@domain.com</li>
              </ul>
            </div>


          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> All rights reserved | Designed & Developed <i class="icon-heart" aria-hidden="true"></i> by <a href="#" 
                class="text-primary">Harman and Preeti</a>
            
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
<script src="js/modernizr.js"></script>
    <!-- <script src="js/jquery.js"></script> -->
  <!-- xzoom plugin here -->
  <script type="text/javascript" src="js/xzoom.min.js"></script>
</body>

</html>