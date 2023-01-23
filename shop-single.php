<!--include header-->
<?php include "include/header.php";
$id=$_GET['id'];
$q="select * from detail where id='$id'";
$exe=mysqli_query($conn,$q);
$fetch=mysqli_fetch_array($exe);?>


<style>
 ul{margin:0;padding:0;}
li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
.highlight,.selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
</style>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a
              href="shop.php">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $fetch['name'] ?></strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto"><section id="default" class="padding-top0">
    <div class="row">
    
      <div class="large-5 column">
        <div class="xzoom-container">
          <img class="xzoom" id="xzoom-default" src="admin/<?php echo $fetch['image'] ?>" xoriginal="admin/<?php echo $fetch['image'] ?>">
          <div class="xzoom-thumbs">
            <a href="admin/<?php echo $fetch['image'] ?>"><img class="xzoom-gallery" width="80" src="admin/<?php echo $fetch['image'] ?> " xpreview="admin/<?php echo $fetch['image'] ?>" title=""></a>
            <a href="admin/<?php echo $fetch['image1'] ?>"><img class="xzoom-gallery" width="80" src="admin/<?php echo $fetch['image1'] ?>"></a>
            <!-- <a href="images/gallery/original/03_r_car.jpg"><img class="xzoom-gallery" width="80" src="images/gallery/preview/03_r_car.jpg" title="The description goes here"></a>
            <a href="images/gallery/original/04_g_car.jpg"><img class="xzoom-gallery" width="80" src="images/gallery/preview/04_g_car.jpg" title="The description goes here"></a> -->
          </div>
        </div>        
      </div>
      <div class="large-7 column"></div>
    </div>
    </section>

          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $fetch['name'] ?></h2>
            <p><?php echo $fetch['description'];?></p>
            

            <p><!-- <del>$95.00</del>  --> <strong class="text-primary h4">Rs.<?php echo $fetch['price'] ?></strong></p>

            
             <form method="post" action="addtocart.php?action=add&id=<?php echo $fetch['id']?>">
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 220px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center" value="1" placeholder=""
                  aria-label="Example text with button addon" aria-describedby="button-addon1" name="quantity">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>
    
            </div>
            <script>
function highlightStar(obj,id) {
  removeHighlight(id);    
  $('#tutorial-'+id+' li').each(function(index) {
    $(this).addClass('highlight');
    if(index == $('#tutorial-'+id+' li').index(obj)) {
      return false; 
    }
  });
}

function removeHighlight(id) {
  $(' #tutorial-'+id+' li').removeClass('selected');
  $('#tutorial-'+id+' li').removeClass('highlight');
}

function addRating(obj,id) {
  $('#tutorial-'+id+' li').each(function(index) {
    $(this).addClass('selected');
    $('#tutorial-'+id+' #rating').val((index+1));
    if(index == $('#tutorial-'+id+' li').index(obj)) {
      return false; 
    }
  });
  $.ajax({
  url: "add_rating.php",
  data:'id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
  type: "POST"
  });
}

function resetRating(id) {
  if($('#tutorial-'+id+' #rating').val() != 0) {
    $('#tutorial-'+id+' li').each(function(index) {
      $(this).addClass('selected');
      if((index+1) == $('#tutorial-'+id+' #rating').val()) {
        return false; 
      }
    });
  }
} 
</script>
 
                       <div id="tutorial-<?php echo $fetch['id']; ?>">
           <input type="hidden" name="rating" id="rating" value="<?php echo $fetch["rating"]; ?>" />
<ul onmouseout="resetRating(<?php echo $fetch['id']; ?>);">
  <?php
  for($i=1;$i<=5;$i++) {
  $selected = "";
  if(!empty($fetch["rating"]) && $i<=$fetch["rating"]) {
  $selected = "selected";
  }
  ?>
  <li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,<?php echo $fetch['id']; ?>);" onmouseout="removeHighlight(<?php echo $fetch['id']; ?>);" onClick="addRating(this,<?php echo $fetch['id']; ?>);">&#9733;</li>  
  <?php }  ?>
<ul>  
     </div>
              <input type="hidden" name="id" value="<?php echo $fetch['id']; ?>">
              <input type="hidden" name="image" value="admin/<?php echo $fetch['image']?>">
              <input type="hidden" name="name" value="<?php echo $fetch['name']; ?>">
              <input type="hidden" name="price" value="<?php echo $fetch['price']; ?>">
            <p><input type="submit" value="Add To Cart" name="add_to_cart" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary"></p>
          </form>
   
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
        <!--    <script src="js/foundation.min.js"></script>
    <script src="js/setup.js"></script> -->

