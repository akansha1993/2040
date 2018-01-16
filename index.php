

<?php include('includes/header.php'); ?>  
<!-- banner -->
<div class="banner">

   <div class="col-md-12">
      <div class="row" data-wow-delay="0.2s">
         <div class="carousel slide" data-ride="carousel" id="quote-carousel">
            <!-- Bottom Carousel Indicators -->
            
            <!-- Carousel Slides / Quotes -->
            <div class="carousel-inner text-center">
              

 <?php $banner=$GFH_Admin->getbanner();
           $i=1;
           while($na=mysqli_fetch_array($banner)){?>
               <!-- Quote 1 -->
               <div class="item <?php if($i==1) { echo 'active';  } ?>">
                  <img src="<?php echo url('images/banner/'.$na['image']); ?>">
               </div>
           
            
            <?php $i++; } ?>

            </div>
            <!-- Carousel Buttons Next/Prev -->
            <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
         </div>
      </div>
   </div>
<!-- //banner --> 
<!-- services tab start -->
<div class="container">
   <div class="servi_wid services_tab" id="service_column">
      <h1>Shop By Category<a class="see" href="#">see more</a></h1>
      <div class="container">
         <div class="row">
            <div class="col-md-9">
               <div class="owl-carousel owl_cra">
               <?php $sql=$GFH_Admin->getcategory();
               while($na=mysqli_fetch_array($sql)){?>
                  <div class="item">
                     <img class="img-responsive" src="<?php echo url('images/category/'.$na['image']);?>">
                     <p><?php echo $na['category_name'];?></p>
                  </div>
                <?php } ?>
               </div>
               <a class="left owl_cra carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="right owl_cra carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
               </a>
            </div>
            <div class="col-md-3">
               <img class="img-responsive" src="assets/images/adv.png" style="height: 270px;
                  margin: 0 auto;">
            </div>
         </div>
      </div>
      <script>
         $('.owl-carousel').owlCarousel({
         loop:true,
         margin:30,
         autoplay:true,
         autoplayTimeout:2000,
         autoplayHoverPause:true,
         nav:true,
         responsive:{
           0:{
             items:2
           },
           768:{
             items:3
           },
           1024:{
             items:4
           }
         }
         });
      </script>
   </div>
</div>
<div class="clearfix"></div>
<div class="container" style="padding-top: 25px;">
   <div class="row">
      <?php $sql=mysqli_query(GFHConfig::$link,"SELECT * FROM `offers_banner` ORDER BY RAND() limit 3");          
while ($na=mysqli_fetch_array($sql)) {?>
      <div class="col-md-4">
         <img class="img-responsive" src="<?php echo url('images/offer-banner/'.$na['image']);?>">
      </div>
      <?php } ?>
   </div>
</div>
<div class="container">
   <div class="col-md-9">
      <!-- welcome -->
      <div class="welcome">
         <div class="">
            <div class="welcome-info">
               <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                  <div class="clearfix"> </div>
                  <div id="service_column">
                     <h1 style="text-align: left;
                        padding-bottom: 20px;">Top Products<a class="see" href="<?php echo url('products1.php?topproduct=top');?>">see more</a></h1>
                  </div>
                  <div id="myTabContent" class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <div class="tabcontent-grids">
                           <div id="owl-demo" class="owl-carousel">
                              <?php $top=$GFH_Admin->gettopproductrandom(10);
                              while($na=mysqli_fetch_array($top)){?>
                              
                              <div class="item">
                                 <img class="img-responsive" src="<?php echo url('images/topproduct/'.$na['thumb']); ?>" alt="img" style="height: 150px">
                                 <p><?php echo $na['prod_name'];?></p>
                                 <div class="price"><i class="fa fa-inr"></i><?php echo $na['prod_price'];?> </div>
                                 <div class="overlay">
                                    <div class="button"><a class="view-button" href="<?php echo url('top-product-overview.php?topproduct='.$na['prod_id']);?>">View</a></div>
                                 </div>
                              </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- //welcome -->
   </div>
   <div class="col-md-3">
      <img class="img-responsive" src="assets/images/adv.png" style="margin: 20px 0px 0px 25px;">
   </div>
</div>
<div class="clearfix"></div>

<div class="container" style="padding-top: 25px;">
   <div class="row">
   <?php $sql=mysqli_query(GFHConfig::$link,"SELECT * FROM `offers_banner` ORDER BY RAND() limit 3");
          $i=1;
while ($na=mysqli_fetch_array($sql)) {?>
      <div class="col-md-4">
         <img class="img-responsive" src="<?php echo url('images/offer-banner/'.$na['image']);?>">
      </div>
      <?php } ?>
       
   </div>
</div>
<div class="clearfix"></div>
<div rclass="tab-pane fade">
   <div class="tabcontent-grids">
      <script>
         $(document).ready(function() { 
          $("#owl-demo4").owlCarousel({
          
            autoPlay: false, //Set AutoPlay to 3 seconds
          
            items :4,
            itemsDesktop : [640,5],
            itemsDesktopSmall : [414,4],
            navigation : true
          
          }); 
         }); 
      </script>
      <div id="owl-demo4" class="owl-carousel">
         <?php $top=$GFH_Admin->getrendomproduct(10);
                              while($na=mysqli_fetch_array($top)){?>
                              
                              <div class="item">
                                 <img class="img-responsive" src="<?php echo url('images/product/'.$na['thumb']); ?>" alt="img">
                                 <p><?php echo $na['prod_name'];?></p>
                                 <div class="price"><i class="fa fa-inr"></i><?php echo $na['prod_price'];?> </div>
                                 <div class="overlay">
                                    <div class="button"><a class="view-button" href="<?php echo url('product-overview.php?product='.$na['prod_id']);?>">View</a></div>
                                 </div>
                              </div>
                              <?php } ?>
          
      </div>
   </div>
</div>
<div rclass="tab-pane fade">
   <div class="tabcontent-grids">
      <script>
         $(document).ready(function() { 
          $("#owl-demo5").owlCarousel({
          
            autoPlay: false, //Set AutoPlay to 3 seconds
          
            items :4,
            itemsDesktop : [640,5],
            itemsDesktopSmall : [414,4],
            navigation : true
          
          }); 
         }); 
      </script>
      <div id="owl-demo5" class="5owl-demo owl-carousel">
            <?php $top=$GFH_Admin->getrendomproduct(10);
                              while($na=mysqli_fetch_array($top)){?>
                              
                              <div class="item">
                                 <img class="img-responsive" src="<?php echo url('images/product/'.$na['thumb']); ?>" alt="img">
                                 <p><?php echo $na['prod_name'];?></p>
                                 <div class="price"><i class="fa fa-inr"></i><?php echo $na['prod_price'];?> </div>
                                 <div class="overlay">
                                    <div class="button"><a class="view-button" href="<?php echo url('product-overview.php?product='.$na['prod_id']);?>">View</a></div>
                                 </div>
                              </div>
                              <?php } ?>
      </div>
   </div>
</div>
<!-- deals -->
<div class="deals">
   <div class="container">
      <h3 class="_winkls-title">Services </h3>
      <div class="deals-row">
         <?php $services=$GFH_Admin->getservice();
                              while($fetch_services=mysqli_fetch_array($services)){?>
         <div class="col-md-3 focus-grid _winkfocus-grid-mdl">
            <a href="description.php?service=<?php echo $fetch_services['service_id']?>" class="wthree-btn wthree">
               <div class="focus-image"><i class="fa fa-plus-square"></i></div>
               <h4 class="clrchg"><?php echo $fetch_services['headline'];?></h4>
            </a>
         </div>
         <?php } ?>
         <!-- <div class="col-md-3 focus-grid _winkfocus-grid-mdl">
            <a href="description.php" class="wthree-btn wthree5">
               <div class="focus-image"><i class="fa fa-medkit"></i></div>
               <h4 class="clrchg">Pathology</h4>
            </a>
         </div>
         <div class="col-md-3 focus-grid _winkfocus-grid-mdl">
            <a href="description.php" class="wthree-btn wthree1">
               <div class="focus-image"><i class="fa fa-ambulance"></i></div>
               <h4 class="clrchg">Service 3</h4>
            </a>
         </div>
         <div class="col-md-3 focus-grid">
            <a href="description.php" class="wthree-btn wthree2">
               <div class="focus-image"><i class="fa fa-stethoscope"></i></div>
               <h4 class="clrchg">Service 4</h4>
            </a>
         </div> -->
         <div class="clearfix"> </div>
      </div>
   </div>
</div>
<!-- //deals --> 
<!-- crousel start -->
<!-- crosel end -->
<!-- footer-top -->
<div class="_winkagile-ftr-top">
   <div class="container">
      <div class="ftr-toprow">
         <div class="col-md-4 ftr-top-grids">
            <div class="ftr-top-left">
               <i class="fa fa-truck" aria-hidden="true"></i>
            </div>
            <div class="ftr-top-right">
               <h4>FREE DELIVERY</h4>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
            </div>
            <div class="clearfix"> </div>
         </div>
         <div class="col-md-4 ftr-top-grids">
            <div class="ftr-top-left">
               <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <div class="ftr-top-right">
               <h4>CUSTOMER CARE</h4>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
            </div>
            <div class="clearfix"> </div>
         </div>
         <div class="col-md-4 ftr-top-grids">
            <div class="ftr-top-left">
               <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
            </div>
            <div class="ftr-top-right">
               <h4>GOOD QUALITY</h4>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
            </div>
            <div class="clearfix"> </div>
         </div>
         <div class="clearfix"> </div>
      </div>
   </div>
</div>
<!-- //footer-top --> 

<!-- <script>
   $('#myModal88').modal('show');
   </script> -->
<?php include('includes/footer.php') ?>

