
<?php include('includes/header.php'); 
if(isset($_GET['topproduct']))
{
$sql=$GFH_Admin->gettopproductrandom(10);

}
?> 


	<!-- products -->
	<div class="products">	 
		<div class="">
			<div class="col-md-9 product-_winkls-right">
				<!-- breadcrumbs --> 
				<ol class="breadcrumb breadcrumb1">
					<li><a href="index.php">Home</a></li>
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
								<li><a href="#">Low price</a></li> 
								<li><a href="#">High price</a></li>
								<li><a href="#">Latest</a></li> 
								<li><a href="#">Popular</a></li> 
							</ul> 
						</li>
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Brand1</a></li> 
								<li><a href="#">Brand2</a></li>
								<li><a href="#">Brand3</a></li> 
								<li><a href="#">Brand4</a></li> 
							</ul> 
						</li>
					</ul> 
					<div class="clearfix"> </div>
				</div>
				<?php
				while($na=mysqli_fetch_array($sql))
					{?>
				<div class="products-row" style="height: 290px;">
					<div class="col-md-3 product-grids"> 
						<!-- <button type="button" class="btn btn-primary">On OFfer</button> -->
						<h5 style="background: #00796B;width: 60px;padding: 3px 2px 2px 2px;color: #fff;z-index: 2;">On Offer</h5>
						<div class="agile-products" style="height: 215px;">	
							<?php $img=explode(",", $na['product_images']);
								
							  ?>
							<a href="single.php"><img src="images/topproduct/<?php echo isset($img[0])?$img[0]:''?>" class="img-responsive" alt="img" style="height: 200px;"></a>
						</div>  
					</div> 	
	
					<div class="col-md-5 product-grids">
						<div class="product-spec">
							<h4><a href=""><?php echo isset($na['prod_name'])?$na['prod_name']:''?></a></h4>
							<div class="star">
								 <button type="button" class="btn btn-primary" style="padding: 0 !important;margin-top: 5px;">4.4 &nbsp;<i class="fa fa-star" aria-hidden="true"></i></button>&nbsp;<p style="padding-left: 50px;padding-top: -11px;margin-top: -19px;font-size: 11px;font-weight: bold;">29440 Ratings & 4031 Reviews</p>
							</div>

							<?php echo isset($na['prod_specification'])?$na['prod_specification']:''?>
						</div>
					</div>
					<div class="col-md-3 product-grids">
						<div class="product-price">
							<div class="pp">
								<a href=""><i class="fa fa-inr" aria-hidden="true"><?php echo isset($na['prod_price'])?$na['prod_price']:''?></i></a>
							</div>
							<h6>
								<del>
									<i class="fa fa-inr" aria-hidden="true" style="text-decoration: line-through;">2500</i>
								</del>&nbsp;&nbsp; 11% off</h6><br>
							<h5>Up to <strong><i class="fa fa-inr" aria-hidden="true">25000</i></strong> off on all exchange</h5><br>
							<h5>EMI starting from <strong><i class="fa fa-inr" aria-hidden="true">1263/month </i></strong></h5><br>
							<h4 style="color:#00796B;font-weight:500;">Offers</h4><br>
							<ul style="padding-left: 18px;">
								<li><a href="">No Cost EMI</a></li>
								<li><a href="">Special Price</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-1"></div>
					 
					<div class="clearfix"> </div>

				</div>
                <?php }?>
				<!-- <div class="products-row" style="height: 290px;">
					<div class="col-md-3 product-grids"> 
						
						<h5 style="background: #00796B;width: 60px;padding: 3px 2px 2px 2px;color: #fff;z-index: 2;">On Offer</h5>
						<div class="agile-products" style="height: 215px;">	
							<a href="single.php"><img src="assets/images/product6.jpg" class="img-responsive" alt="img" style="height: 200px;"></a>
						</div>  
					</div> 	
	
					<div class="col-md-5 product-grids">
						<div class="product-spec">
							<h4><a href="">Apple Iphone 6(Space Gray1)</a></h4>
							<div class="star">
								 <button type="button" class="btn btn-primary" style="padding: 0 !important;margin-top: 5px;">4.4 &nbsp;<i class="fa fa-star" aria-hidden="true"></i></button>&nbsp;<p style="padding-left: 50px;padding-top: -11px;margin-top: -19px;font-size: 11px;font-weight: bold;">29440 Ratings & 4031 Reviews</p>
							</div>

							
							<ul style="padding-left: 17px;padding-top: 6px;">
								<li><a href="">32 GB ROM</a></li>
								<li><a href="">4.7 inch Ratina inch Display</a></li>
								<li><a href="">8MP rear Camera/2MP front Camera</a></li>
								<li><a href="">LI-on Battery</a></li>
								<li><a href="">Apple A8 64-bit processor and M8 Motion Co-processor</a></li>
								<li><a href="">Brand Warranty of 1 Year</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 product-grids">
						<div class="product-price">
							<div class="pp">
								<a href=""><i class="fa fa-inr" aria-hidden="true">26,032</i></a>
							</div>
							<h6>
								<del>
									<i class="fa fa-inr" aria-hidden="true" style="text-decoration: line-through;">2500</i>
								</del>&nbsp;&nbsp; 11% off</h6><br>
							<h5>Up to <strong><i class="fa fa-inr" aria-hidden="true">25000</i></strong> off on all exchange</h5><br>
							<h5>EMI starting from <strong><i class="fa fa-inr" aria-hidden="true">1263/month </i></strong></h5><br>
							<h4 style="color:#00796B;font-weight:500;">Offers</h4><br>
							<ul style="padding-left: 18px;">
								<li><a href="">No Cost EMI</a></li>
								<li><a href="">Special Price</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-1"></div>
					 
					<div class="clearfix"> </div>

				</div>

				<div class="products-row" style="height: 290px;">
					<div class="col-md-3 product-grids"> 
						
						<h5 style="background: #00796B;width: 60px;padding: 3px 2px 2px 2px;color: #fff;z-index: 2;">On Offer</h5>
						<div class="agile-products" style="height: 215px;">	
							<a href="single.php"><img src="assets/images/product6.jpg" class="img-responsive" alt="img" style="height: 200px;"></a>
						</div>  
					</div> 	
	
					<div class="col-md-5 product-grids">
						<div class="product-spec">
							<h4><a href="">Apple Iphone 6(Space Gray)</a></h4>
							<div class="star">
								 <button type="button" class="btn btn-primary" style="padding: 0 !important;margin-top: 5px;">4.4 &nbsp;<i class="fa fa-star" aria-hidden="true"></i></button>&nbsp;<p style="padding-left: 50px;padding-top: -11px;margin-top: -19px;font-size: 11px;font-weight: bold;">29440 Ratings & 4031 Reviews</p>
							</div>

							
							<ul style="padding-left: 17px;padding-top: 6px;list-style: none !important;">
								<li><a href="">32 GB ROM</a></li>
								<li><a href="">4.7 inch Ratina inch Display</a></li>
								<li><a href="">8MP rear Camera/2MP front Camera</a></li>
								<li><a href="">LI-on Battery</a></li>
								<li><a href="">Apple A8 64-bit processor and M8 Motion Co-processor</a></li>
								<li><a href="">Brand Warranty of 1 Year</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 product-grids">
						<div class="product-price">
							<div class="pp">
								<a href=""><i class="fa fa-inr" aria-hidden="true">26,032</i></a>
							</div>
							<h6>
								<del>
									<i class="fa fa-inr" aria-hidden="true" style="text-decoration: line-through;">2500</i>
								</del>&nbsp;&nbsp; 11% off</h6><br>
							<h5>Up to <strong><i class="fa fa-inr" aria-hidden="true">25000</i></strong> off on all exchange</h5><br>
							<h5>EMI starting from <strong><i class="fa fa-inr" aria-hidden="true">1263/month </i></strong></h5><br>
							<h4 style="color:#00796B;font-weight:500;">Offers</h4><br>
							<ul style="padding-left: 18px;">
								<li><a href="">No Cost EMI</a></li>
								<li><a href="">Special Price</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-1"></div>
					 
					<div class="clearfix"> </div>

				</div> -->
				
			</div>
			<div class="col-md-3 rsidebar">
				<h1 style="text-align: center;"><strong>IPhone</strong></h1>
				<div class="rsidebar-top">
					<div class="slider-left">
						<h5><strong>Best Time To Buy an Iphone!</strong></h5>
						<h6>Checkout all the offers here</h6> <br>						<h3 class="h3">Filters</h3>
						
						
						
					</div>
					<div class="sidebar-row">
						<h5>Categories</h5>
						<ul class="faq">
							<li class="item1"><a href="#">Mobile & Accesories<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#">Mobile</a></li>										
									<li class="subitem1"><a href="#">Mobile Accesories</a></li>										
									<li class="subitem1"><a href="#">Tablet Accesories</a></li>										
								</ul>
							</li>
							
						</ul>


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

					<!-- <div data-role="page">
						<div data-role="main" class="ui-content">
					    <form method="post" action="/action_page_post.php">
					      <div data-role="rangeslider">
					        <label for="price-min">Price:</label>
					        <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
					        <label for="price-max">Price:</label>
					        <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
					      </div>
					       
					      </form>
					  </div>
					</div> -->
					<div class="sidebar-row">
						<h5>Avaliability</h5>
						<div class="row row1 scroll-pane">
							<label class="checkbox" style="font-size: 12px;"><input type="checkbox" name="checkbox" checked=""><i></i>Exclude Out Of Stock</label>
						</div>	
					</div>

					<div class="sidebar-row" style="margin-top: -35px;">
						<h5>Brand</h5>
						<div class="row row1 scroll-pane">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Brand1</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Brand2</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Brand3</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Brand4</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Brand5</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i> Brand6</label> 
						</div>
					</div>

					<div class="sidebar-row">
						<h5>Offers</h5>
						<div class="row row1 scroll-pane">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Upto - 10% (20)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>70% - 60% (5)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>50% - 40% (7)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (2)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (5)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
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
					<div class="item">
						<div class="glry-_winkagile-grids agileits">
							<div class="new-tag"><h6>20% <br> Off</h6></div>
							<a href="#"><img src="assets/images/product6.jpg" alt="img"></a>
							<div class="view-caption agileits-_winklayouts">           
								<h4><a href="#">Women Sandal</a></h4>
								<p>Lorem ipsum dolor sit amet consectetur</p>
								<h5>$20</h5>
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
					<div class="item">
						<div class="glry-_winkagile-grids agileits"> 
							<div class="new-tag"><h6>New</h6></div>
							<a href="#"><img src="assets/images/product2.jpg" alt="img"></a>
							<div class="view-caption agileits-_winklayouts">           
								<h4><a href="#">Coffee Mug</a></h4>
								<p>Lorem ipsum dolor sit amet consectetur</p>
								<h5>$14</h5>
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="_winkls_item" value="Coffee Mug" /> 
									<input type="hidden" name="amount" value="14.00" /> 
									<button type="submit" class="_winkls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form>
							</div>         
						</div>  
					</div>
					<div class="item">
						<div class="glry-_winkagile-grids agileits"> 
							<div class="new-tag"><h6>20% <br> Off</h6></div>
							<a href="#"><img src="assets/images/product1.jpg" alt="img"></a>
							<div class="view-caption agileits-_winklayouts">              
								<h4><a href="#">Teddy bear</a></h4>
								<p>Lorem ipsum dolor sit amet consectetur</p>
								<h5>$20</h5>
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="_winkls_item" value="Teddy bear" /> 
									<input type="hidden" name="amount" value="20.00" /> 
									<button type="submit" class="_winkls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form>
							</div>        
						</div> 
					</div>
					<div class="item">
						<div class="glry-_winkagile-grids agileits"> 
							<a href="#"><img src="assets/images/product4.jpg" alt="img"></a>
							<div class="view-caption agileits-_winklayouts">           
								<h4><a href="#">Football</a></h4>
								<p>Lorem ipsum dolor sit amet consectetur</p>
								<h5>$70</h5>
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="_winkls_item" value="Football"/> 
									<input type="hidden" name="amount" value="70.00"/>
									<button type="submit" class="_winkls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form>
							</div>        
						</div> 
					</div> 
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

  
	<!-- //cart-js -->  
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.js"></script>