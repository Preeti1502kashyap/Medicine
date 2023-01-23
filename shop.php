<!--include header-->
<?php include "include/header.php";

$id= $_GET['id'];
?>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Store</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        
        <div class="row">
          <div class="col-lg-6">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
            <div id="slider-range" class="border-primary"></div>
            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
          </div>
          <div class="col-lg-6">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Reference</h3>
            <button type="button" class="btn btn-secondary btn-md dropdown-toggle px-4" id="dropdownMenuReference"
              data-toggle="dropdown">Reference</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
              <a class="dropdown-item" href="#">Relevance</a>
              <a class="dropdown-item" href="#">Name, A to Z</a>
              <a class="dropdown-item" href="#">Name, Z to A</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Price, low to high</a>
              <a class="dropdown-item" href="#">Price, high to low</a>
            </div>
          </div>
        </div>
    
        <div class="row">
          <?php if($id!=""){ 
  
          $que= "SELECT * FROM detail where cat_id='$id'";     
          $result = mysqli_query ($conn, $que); 
          while ($fetch= mysqli_fetch_array($result)) {
        ?>
          <div class="col-sm-5 col-lg-3 text-center item mb-4 rounded">
            <!-- <span class="tag">Sale</span> -->
            <a href="shop-single.php?id=<?php echo $fetch['id'] ?>"> <img src="admin/<?php echo $fetch['image'] ?>" alt="Image"></a>
            <h4  class=" text-black"><a href="shop-single.php?id=<?php echo $fetch['id'] ?>"><?php echo ucwords($fetch['name']); ?></a></h4>
            <p class="price bg-warning text-white"><!-- <del>95.00</del>  &mdash;-->Rs.  <?php echo $fetch['price'] ?></p>
          </div>
        <?php } } else {

          $per_page_record = 6;  // Number of entries to show in a page.   
        // Look for a GET variable page if not found default is 1.        
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
          $page=1;    
        }    
    
        $start_from = ($page-1) * $per_page_record;   
 $query = "SELECT * FROM detail LIMIT $start_from, $per_page_record";     
        $rs_result = mysqli_query ($conn, $query); 
          while ($fetch= mysqli_fetch_array($rs_result)) {
        ?>
          <div class="col-sm-5 col-lg-3 text-center item mb-4 rounded">
            <!-- <span class="tag">Sale</span> -->
            <a href="shop-single.php?id=<?php echo $fetch['id'] ?>"> <img src="admin/<?php echo $fetch['image'] ?>" alt="Image"></a>
            <h4  class=" text-black"><a href="shop-single.php?id=<?php echo $fetch['id'] ?>"><?php echo ucwords($fetch['name']); ?></a></h4>
            <p class="price bg-warning text-white"><!-- <del>95.00</del>  &mdash;-->Rs.  <?php echo $fetch['price'] ?></p>
          </div>

<?php } } ?>
</div> 
        <div class="row mt-5">
          <div class="col-md-12 text-center">
            <div class="site-block-27">
              <ul class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM detail";     
        $rs_result = mysqli_query($conn, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<li class='page-item'><a href='shop.php?page=".($page-1)."'>  Prev </a></li>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<li class='page-item'><a class = 'active' href='shop.php?page="  
                                                .$i."'>".$i." </a></li>";   
          }               
          else  {   
              $pagLink .= "<li class='page-item'><a href='shop.php?page=".$i."'>   
                                                ".$i." </a></li>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<li class='page-item'><a href='shop.php?page=".($page+1)."'>  Next </a></li>";   
        }   
  
      ?> 
      </ul>   
      </div>  
     
                </div>
            </div><!--/.module-->
<script>   
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'shop.php?page='+page;   
    }   
  </script>  

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
                <p>Medicine is the science and practice of caring for a patient and managing the diagnosis, prognosis, prevention, treatment or palliation of their injury or disease.
                </p>
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