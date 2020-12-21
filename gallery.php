<?php require("layouts/header2.php");?>

<!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center text-light" style="background-image: url(img/services-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Gallery Grid</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="#">Page</a></li>
                        <li class="active">Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star Portfolio
    ============================================= -->

    <div class="portfolio-area default-padding">
        <div class="container">
            <div class="gallery-items-area text-center">
                <div class="row">
                    <div class="col-md-12 gallery-content">    
                    <div class="site-heading text-center">
                        <!-- <h4>Recent work</h4> -->
                        <h2>Our Portfolio</h2>
                        <span class="devider"></span>
                    </div>
                                        
                        <!-- End Mixitup Nav-->
                        <div class="row magnific-mix-gallery text-center masonary">
<?php
// Include the database configuration file
include 'upladportfolio/config.php';

// Get images from the database
$query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

?>
                            <div id="portfolio-grid" class="gallery-items col-3">
                                <!-- Single Item -->
                                <?php if($query->num_rows > 0){
                                    while($row = $query->fetch_assoc()){
                                        $imageURL = 'upladportfolio/uploads/'.$row["file_name"];
                                ?>
                                <div class="pf-item development capital">
                                    <div class="effect-box">
                                    <img src="<?php echo $imageURL; ?>"  class="sizer"  alt="" />
                                        <!-- <img src="assets/img/800x800.png" alt="thumb"> -->
                                        <div class="info">                                            
                                            <a href="<?php echo $imageURL; ?>" class="item popup-link"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                    </div>
                                </div>     
                                <?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>                            
                                <!-- End Single Item -->                                  
                            </div>                                         
                        </div>                
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Portfolio -->
<?php

    require("layouts/footer.php");
?>