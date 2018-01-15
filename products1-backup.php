<?php include('includes/header.php'); ?> 	
	<!-- products -->
	<div class="products">	 
		<div class="container">
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
				<div class="products-row">
					<div class="col-md-3 product-grids"> 
						<div class="agile-products">
							<div class="new-tag"><h6>5% <br> Off</h6></div>
							<a href="single.php"><img src="assets/images/product6.jpg" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5><a href="single.php">Smart Phone</a></h5> 
								<h6><del>$100</del> $70</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="_winkls_item" value="Smart Phone"/> 
									<input type="hidden" name="amount" value="70.00"/> 
									<button type="submit" class="_winkls-cart p_winkls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form>
							</div>
						</div>  
					</div> 
					<div class="col-md-3 product-grids"> 
						<div class="agile-products">
							<div class="new-tag"><h6>20%<br>Off</h6></div>
							<a href="single.php"><img src="assets/images/product1.jpg" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5><a href="single.php">Audio speaker</a></h5> 
								<h6><del>$200</del> $100</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="_winkls_item" value="Audio speaker" /> 
									<input type="hidden" name="amount" value="100.00" /> 
									<button type="submit" class="_winkls-cart p_winkls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form> 
							</div>
						</div> 
					</div> 
					<div class="col-md-3 product-grids">
						<div class="agile-products">
							<div class="new-tag"><h6>New</h6></div>
							<a href="single.php"><img src="assets/images/product2.jpg" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5><a href="single.php">Refrigerator</a></h5> 
								<h6><del>$700</del> $300</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="_winkls_item" value="Refrigerator" /> 
									<input type="hidden" name="amount" value="300.00" /> 
									<button type="submit" class="_winkls-cart p_winkls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</form>
							</div>
						</div>
					</div> 
					<div class="clearfix"> </div>
				</div>
				<!-- add-products --> 
				<div class="_winkls-add-grids _winkagile-add-products">
					<a href="#"> 
						<h4>TOP 10 TRENDS FOR YOU FLAT <span>20%</span> OFF</h4>
						<h6>Shop now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div> 
				<!-- //add-products -->
			</div>
			<div class="col-md-3 rsidebar">
				<div class="rsidebar-top">
					<div class="slider-left">
						<h4>Filter By Price</h4>            
						<div class="row row1 scroll-pane">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>0 - Rs. 100 </label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs. 100 - Rs. 200 </label> 
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs. 200 - Rs. 250  </label> 
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs. 250 - Rs. 300 </label> 
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs. 350 - Rs. 400 </label> 
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs. 450 - Rs. 500  </label> 
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>More</label> 
						</div> 
					</div>
					<div class="sidebar-row">
						<h4> By Product</h4>
						<ul class="faq">
							<li class="item1"><a href="#">Product Name<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#">Category1</a></li>										
									<li class="subitem1"><a href="#">Category2</a></li>										
									<li class="subitem1"><a href="#">Category3</a></li>										
								</ul>
							</li>
							<li class="item2"><a href="#">Product Name<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#">Category1 </a></li>										
									<li class="subitem1"><a href="#">Category2 </a></li>										
									<li class="subitem1"><a href="#">Category3 </a></li>										
									<li class="subitem1"><a href="#">Category4</a></li>										
								</ul>
							</li>
							<li class="item3"><a href="#">Product Name<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#"> Category1</a></li>										
									<li class="subitem1"><a href="#">Category2 </a></li>										
									<li class="subitem1"><a href="#">Category3</a></li>										
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
					</div>
					<div class="sidebar-row">
						<h4>DISCOUNTS</h4>
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
					<div class="sidebar-row">
						<h4>Brand</h4>
						<div class="row row1 scroll-pane">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Brand1</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Brand2</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Brand3</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Brand4</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Brand5</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i> Brand6</label> 
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