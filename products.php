
<?php include('includes/header.php'); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.2.0/css/ion.rangeSlider.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.2.0/css/ion.rangeSlider.skinFlat.css">
<!-- products -->
	<div class="products">	 
		<div class="">
			<div class="col-md-9 product-_winkls-right">
				<!-- breadcrumbs --> 
				<ol class="breadcrumb breadcrumb1">
					<li><a href="index.html">Home</a></li>
					<li class="active">Products</li>
				</ol> 
				<div class="clearfix"> </div>
				<!-- //breadcrumbs -->
				<div class="product-top">
					<h4>Product</h4>
					<ul> 
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter By<span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                <div class="arrow_drop"></div>
								<li><a href="#">Low price</a></li> 
								<li><a href="#">High price</a></li>
								<li><a href="#">Latest</a></li> 
								<li><a href="#">Popular</a></li> 
							</ul> 
						</li>
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands<span class="caret"></span></a>
							<ul class="dropdown-menu">
                                <div class="arrow_drop"></div>
								<?php $brands=$GFH_Admin->getbrand();
								while($brand=mysqli_fetch_array($brands)){?>
								<li><a href="#" class="brand">Brand1</a></li>
								<?php } ?>


							</ul>
						</li>
					</ul> 
					<div class="clearfix"> </div>
				</div> <div class="features-tab paginate 1">
					<div class="" id="change_div">
                        <div class="products-row items">
				<?php $product=$GFH_Admin->getproduct_by($_GET['cate'],$_GET['subcate']);				
					while ($na=mysqli_fetch_array($product)) {?>
			 

                        <div class="col-md-4 product-grids">
                            <div class="agile-products">
                                <a href="single.php"><img src="<?php echo url('images/product/'.$na['thumb']);?>" class="img-responsive img_align" alt="img"></a>
                                <div class="agile-product-text">
                                    <div class="product-spec text-center">
                                    <h4><a href="product-overview.php?product=<?php echo $na['prod_id'];?>"><?php echo $na['prod_name'];?></a></h4>
                                    </div>
                                    <h6 class="text-center"><del></del><i class="fa fa-inr"></i>  <?php echo $na['prod_price'];?></h6>
                                    <form action="product-overview.php?product=<?php echo $na['prod_id'];?>" method="post">
                                        <button class="_winkls-cart p_winkls-cart"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                    </form>
                                </div>
                            </div>
                        </div>


				<?php } ?>
                        </div>
 	
					</div>
					<div class="clearfix"> </div>
<div class="shop-all-tab-cr shop-bottom">
                                <div class="pager">
                                    <div class="firstPage">&laquo;</div>
                                    <div class="previousPage">&lsaquo;</div>
                                    <div class="pageNumbers"></div>
                                    <div class="nextPage">&rsaquo;</div>
                                    <div class="lastPage">&raquo;</div>
                                </div>
                            </div>
					</div>

				<!-- //add-products -->
			</div>
			<div class="col-md-3 rsidebar">

				<div class="rsidebar-top">
					<div class="slider-left">
						<!--<h5><strong>Best Time To Buy an Iphone!</strong></h5>
						<h6>Checkout all the offers here</h6> <br>	-->
                        <h3 class="h3">Filters</h3>



						<!-- <h4>Filter By Price</h4>
						<div class="row row1 scroll-pane">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>0 - Rs. 100 </label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs. 100 - Rs. 200 </label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs. 200 - Rs. 250  </label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs. 250 - Rs. 300 </label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs. 350 - Rs. 400 </label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs. 450 - Rs. 500  </label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>More</label>
						</div> -->
					</div>
					<div class="sidebar-row">
						 


						<!-- script for tabs -->
						<script type="text/javascript">
							$(function() {
							
								var menu_ul = $('.faq > li > ul'),
									   menu_a  = $('.faq > li > a');
								
								menu_ul.hide();
							
								menu_a.click(function(e) {
									e.preventDefault();
									if(!$(this).hasClass('active')) {
										menu_a.removeClass('active');
										menu_ul.filter(':visible').slideUp('normal');
										$(this).addClass('active').next().stop(true,true).slideDown('normal');
									} else {
										$(this).removeClass('active');
										$(this).next().stop(true,true).slideUp('normal');
									}
								});
							
							});
						</script>
						<!-- script for tabs -->
					</div><br>

					 

					<div class="sidebar-row" style="margin-top: -35px;">
						<h5>Brand</h5>
						<div class="row row1 scroll-pane">
							
								<?php $brands=$GFH_Admin->getbrand();
								while($brand=mysqli_fetch_array($brands)){?>
							  <label class="checkbox"><input type="checkbox" class="brand" name="brand" value="<?php echo $brand['brand_id'];?>" checked=""><i></i><?php echo $brand['brand_name'];?></label>
							 <?php } ?> 
						</div>
					</div>
<h5>Price</h5>
<div class="range-slider">
    <input type="text" class="js-range-slider" value="" />
</div>
<div class="extra-controls">
    <input type="text" maxlength="4" value="0" class="inp js-from" />
    <input type="text" maxlength="8" value="10000000" class="inp js-to" />
</div> 

					<div class="sidebar-row">
						<h5>Offers</h5>
						<div class="row row1 scroll-pane">
						<?php $sql=$GFH_Admin->getdiscount();
						while($na=mysqli_fetch_array($sql)){?>
							<label class="checkbox"><input type="checkbox" name="checkbox" class="discount" value="<?php echo $na['discount_id'];?>"><i></i><?php echo $na['discount_value'];?>%</label>
							<?php } ?>
							 
						</div>
					</div>
								 
				</div>
				<div class="related-row">
					<h4>Related Searches</h4>
					<ul>
						<li><a href="#">Air conditioner </a></li>
						<li><a href="#">Gaming</a></li>
						<li><a href="#">Monitors</a></li>
						<li><a href="#">Pc </a></li>
						<li><a href="#">Food Processors</a></li>
						<li><a href="#">Oven</a></li>
						<li><a href="#">Purifiers</a></li>
						<li><a href="#">Oven</a></li>
						<li><a href="#">Cleaners</a></li>
						<li><a href="#">Small devices</a></li>
					</ul>
				</div>
				<div class="related-row">
					<h4>YOU MAY ALSO LIKE</h4>
					<div class="galry-like">  
						<a href="single.php"><img src="assets/images/product1.jpg" class="img-responsive" alt="img"></a>             
						<h4><a href="#">Medical Product</a></h4> 
						<h5>$100</h5>       
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
			<!-- recommendations -->
			<div class="recommend">
				<h3 class="_winkls-title">Our Recommendations </h3> 
				<script>
					$(document).ready(function() { 
						$("#owl-demo5").owlCarousel({
					 
						  autoPlay: 3000, //Set AutoPlay to 3 seconds
					 
						  items :4,
						  itemsDesktop : [640,5],
						  itemsDesktopSmall : [414,4],
						  navigation : true
					 
						});
						
					}); 
				</script>
							<div id="owl-demo5" class="owl-carousel">
				<?php $prd=$GFH_Admin->getproduct_by($na['category_id']);
				while($gh=mysqli_fetch_array($prd)){?>
					<div class="item">
						<div class="glry-_winkagile-grids agileits">
							<!-- <div class="new-tag"><h6>20% <br> Off</h6></div> -->
							<a href="product-overview.php?product=<?php echo $gh['prod_id'];?>"><img src="<?php echo url('images/product/'.$gh['thumb']); ?>" alt="img"></a>
							<div class="view-caption agileits-_winklayouts">           
								<h4><a href="product-overview.php?product=<?php echo $gh['prod_id'];?>"><?php echo $gh['prod_name'];?></a></h4>
								 <?php echo $gh['prod_description'];?>
								<h5>Rs. <?php echo $gh['prod_price'];?></h5>
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="_winkls_item" value="Women Sandal" /> 
									<input type="hidden" name="amount" value="20.00" /> 
									<button type="submit" class="_winkls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form>
							</div>        
						</div> 
					</div>
					<?php } ?>
					 
				</div>   
			</div>
			<!-- //recommendations -->
		</div>
	</div>
	<!--//products--> 
	
	<!-- cart-js -->
	<script src="assets/js/minicart.js"></script>
	<script>
        _winkls.render();

        _winkls.cart.on('_winksb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) {
        			items[i].set('shipping', 0);
        			items[i].set('shipping2', 0);
        		}
        	}
        });
    </script> 
  
<?php include 'includes/footer.php'; ?>

    <script src="assets/js/paginga.jquery.js"></script>
<script>
    $(function() {
        $(".paginate").paginga({
            // use default options
        });

        $(".paginate-page-2").paginga({
            page: 10
        });

        $(".paginate-no-scroll").paginga({
            scrollToTop: false
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>
	<!-- //cart-js -->  
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.2.0/js/ion.rangeSlider.js"></script>

<script type="text/javascript">
	var $range = $(".js-range-slider"),
    $from = $(".js-from"),
    $to = $(".js-to"),
    range,
    min = 0,
    max = 2000,
    from,
    to;

var updateValues = function () {
    $from.prop("value", from);
    $to.prop("value", to);
};

$range.ionRangeSlider({
    type: "double",
    min: min,
    max: max,
    prettify_enabled: false,
    grid: true,
    grid_num: 10,
    onChange: function (data) {

        from = data.from;
        to = data.to;
        
        updateValues();
             var brand = new Array();
            var sort_price = to;
            var sort_filter = $('#sort_filter').val();
            $('input[name="brand"]:checked').each(function () {
                brand.push(this.value);
            });
            //alert(sort_price);
            $.ajax({
                type: 'post',
                url: 'sort-product.php',
                data: {brand: brand, sort_price: sort_price, sort_filter: sort_filter,category_id: '<?php echo $_GET['cate'];?>'},
                success: function (result) {
                	//alert(sort_price);
  document.getElementById('change_div').innerHTML=result;

                }
            });
 
    }
});

range = $range.data("ionRangeSlider");

var updateRange = function () {
    range.update({
        from: from,
        to: to
    });
};

$from.on("change", function () {
    from = +$(this).prop("value");
    if (from < min) {
        from = min;
    }
    if (from > to) {
        from = to;
    }

    updateValues();    
    updateRange();
});

$to.on("change", function () {
    to = +$(this).prop("value");
    if (to > max) {
        to = max;
    }
    if (to < from) {
        to = from;
    }

    updateValues();    
    updateRange();
});
</script>
<script>
    $(document).ready(function (e) {
        $('.brand, #sort_price, #sort_filter').on('click', function (e) {
             var brand = new Array();
            var sort_price = from;
            var sort_filter = $('#sort_filter').val();
            $('input[name="brand"]:checked').each(function () {
                brand.push(this.value);
            });
            //alert(sort_price);
            $.ajax({
                type: 'post',
                url: 'sort-product.php',
                data: {brand: brand, sort_price: sort_price, sort_filter: sort_filter,category_id: '<?php echo $_GET['cate'];?>'},
                success: function (result) {
                	//alert(result);
  document.getElementById('change_div').innerHTML=result;

                }
            });

        });

    });


</script>