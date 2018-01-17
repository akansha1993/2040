<?php include('includes/header.php'); 

if(isset($_GET['topproduct']))
	{
$sql=$GFH_Admin->gettopproduct($_GET['topproduct']);
$na=mysqli_fetch_array($sql);
}
?>
	<!-- breadcrumbs --> 
	<div class="container"> 
		<ol class="breadcrumb breadcrumb1">
			<li><a href="index.php">Home</a></li>
			<li class="active">Single Page</li>
		</ol> 
		<div class="clearfix"> </div>
	</div>
	<!-- //breadcrumbs -->
	<!-- products -->
	<div class="products container">	 
		<div class="">  
			<div class="single-page">
				<div class="single-page-row" id="detail-21">

					<div class="col-md-6 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<?php $img=explode(",", $na['product_images']);
								$i=1;
							  foreach($img as $prodimg) {?>
								<li data-thumb="<?php echo url('images/topproduct/'.$prodimg);?>">
									<div class="thumb-image <?php if($i==1){ echo 'detail_images'; }?> "> <img src="<?php echo url('images/topproduct/'.$prodimg);?>" data-imagezoom="true" alt=""> </div>
								</li>
								<?php } ?>
 
							</ul>
						</div>
					</div>

					<div class="col-md-6 single-top-right">
						<div class="product-spec">
							<h4><a href=""><?php echo $na['prod_name']; ?></a></h4>
							<div class="star">
								 <button type="button" class="btn btn-primary" style="padding: 0 !important;margin-top: 5px;">4.4 &nbsp;<i class="fa fa-star" aria-hidden="true"></i></button>&nbsp;<p style="padding-left: 50px;padding-top: -11px;margin-top: -19px;font-size: 11px;font-weight: bold;">29440 Ratings & 4031 Reviews</p>
							</div><br>

						 
							

							<div class="single-detail">
								 <?php echo $na['prod_description']; ?>
							</div><br>

						<div class="single-price">
							<ul>
								<li>Rs.  <?php echo $na['prod_price']; ?>    </li>  
								<li><del>Rs. <?php echo $na['mrate']; ?></del></li> 
								<li><span class="_winkoff"><?php echo $na['mrate']; ?></i>&nbsp;&nbsp;&nbsp;<?php echo 'Rs.'. round($na['mrate']-$na['prod_price'],2);?> Off</span></li> 
								<!-- <li>Ends on: June,5th</li> -->
								<!-- <li><a href="#"><i class="fa fa-gift" aria-hidden="true"></i> Coupon</a></li> -->
							</ul>	
						</div> 
						<br>
<h2 style="color: #000;font-size: 25px;padding-bottom: 10px;">Select Quantity</h2>
<form id='myform' method='POST' action='#'>
    <input type='button' value='-' class='qtyminus btn btn-danger' field='quantity' />
    <input type='text' class="form-control" name='quantity' id="prod_quantity" value='1' class='qty' />
    <input type='button' value='+' class='qtyplus btn btn-primary' field='quantity' />
</form>
					<div class="sidebar-row">
						<h5 class="row_size1">Size</h5>
						<div class="row row_size">
							<label class="checkbox"><input type="radio" name="size" value="1"><i></i>S</label>
							<label class="checkbox"><input type="radio" name="size" value="2"><i></i>M</label>
							<label class="checkbox"><input type="radio" name="size" value="3"><i></i>XL</label>
						</div>
					</div>
							

						</div> 
						<div class="single-rating">
							<ul>
								<div class="stars starrr" data-rating="0" style="display: inline-block;"></div>
								<li class="rating"><a class="collapsed pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><?php $re=$GFH_Admin->get_reviewbyproduct($_GET['topproduct'],'topproduct');
							echo mysqli_num_rows($re); ?> reviews</a></li>
								<li><a <?php if(!empty($_SESSION['client_id'])){ echo 'href="#reviews-anchor" id="open-review-box"';} ?>>Add your review</a></li>
							</ul> 
							<div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12 well">
                <?php if(isset($_POST['review'])){ $GFH_Admin->review(); }   ?>
                    <form accept-charset="UTF-8" action="#" method="post">
                        <input id="ratings-hidden" name="rating" type="hidden">
                        <input type="hidden" name="product_id" value="<?php echo $_GET['topproduct'];?>">
                         <input type="hidden" name="product_type" value="topproduct">
                        <textarea class="form-control animated" cols="50" id="new-review" name="review" placeholder="Enter your review here..." rows="5"></textarea>        
                        <div class="text-right">
                        	<ul>
                            <div class="stars starrr" data-rating="0" style="display: inline-block;"></div>
                        </ul>
                            <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <button class="btn btn-success btn-lg" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div> 
						</div>
						<p class="single-price-text"></p>
						 
							<button type="submit" class="_winkls-cart" onclick="addtocart(<?php echo $na['prod_id'];?>);" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
					
						<button  onclick="location.href='cart.php'" class="_winkls-cart _winkls-cart-like"><i class="fa fa-heart-o" aria-hidden="true"></i> Buy Now</button>
					</div>
				   <div class="clearfix"> </div>  
				</div>
			</div> 
			<!-- recommendations -->
			<div class="recommend">
				<h3 class="_winkls-title">Our Recommendations </h3> 
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
				<div id="owl-demo5" class="owl-carousel">
				<?php $prd=$GFH_Admin->getproducttop_by($na['category_id']);
				while($gh=mysqli_fetch_array($prd)){?>
					<div class="item">
						<div class="glry-_winkagile-grids agileits">
							<!-- <div class="new-tag"><h6>20% <br> Off</h6></div> -->
							<a href="top-product-overview.php?topproduct=<?php echo $gh['prod_id'];?>"><img src="<?php echo url('images/topproduct/'.$gh['thumb']); ?>" alt="img"></a>
							<div class="view-caption agileits-_winklayouts">           
								<h4><a href="product-overview.php?product=<?php echo $gh['prod_id'];?>"><?php echo $gh['prod_name'];?></a></h4>
								<p style="    height: 180px;
    overflow: hidden;
    text-overflow: ellipsis;;"><?php echo $gh['prod_description'];?></p>
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
			<!-- collapse-tabs -->
			<div class="collpse tabs">
				<h3 class="_winkls-title">About this item</h3> 
				<div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<i class="fa fa-file-text-o fa-icon" aria-hidden="true"></i> Description <span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<?php echo $na['prod_description'];?>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a class="collapsed pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<i class="fa fa-info-circle fa-icon" aria-hidden="true"></i> additional information <span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
								</a> 
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
							<?php echo $na['prod_specification'];?>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title">
								<a class="collapsed pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<i class="fa fa-check-square-o fa-icon" aria-hidden="true"></i> reviews (<?php echo mysqli_num_rows($re);?>) <span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
								</a>
							
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
									<?php while($na=mysqli_fetch_array($re)){?>
								<div class=""><?php echo $na['user_name'];?><p><?php echo $na['review'];?><br><small style="font-size: 9px;"><?php echo $na['created_on'];?></small></p></div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingFour">
							<h4 class="panel-title">
								<a class="collapsed pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									<i class="fa fa-question-circle fa-icon" aria-hidden="true"></i> Features <span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
								</a>
							</h4>
						</div>
						<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
							<div class="panel-body">
								<?php echo $na['prod_features'];?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- //collapse --> 
			<!-- offers-cards --> 
			<div class="_winksingle-offers offer-bottom"> 
				<div class="col-md-6 offer-bottom-grids">
					<div class="offer-bottom-grids-info2">
						<h4>Special Gift Cards</h4> 
						<h6>More brands, more ways to shop. <br> Check out these ideal gifts!</h6>
					</div>
				</div>
				<div class="col-md-6 offer-bottom-grids">
					<div class="offer-bottom-grids-info">
						<h4>Flat $10 Discount</h4> 
						<h6>The best Shopping Offer <br> On Fashion Store</h6>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- //offers-cards -->
		</div>
	</div>
	<!--//products-->  
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
	<!-- subscribe -->
<script>
	 function addtocart(pid) {
	 	var quantity=document.getElementByID('prod_quantity').value;
	 	       $.ajax({
                type: 'post',
                url: 'updatecart.php',
                data: {cart: pid,quantity: quantity},
                success: function (result) {
                	$("#cart_count").html(result);
                }
            });
        }
</script>
<?php include 'includes/footer.php'; ?>
<script type="text/javascript">
	(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","i",function(e){return o.syncRating(o.$el.find("i").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","i",function(e){return o.setRating(o.$el.find("i").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<li><i class='fa fa-star-o'></i></li>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("i").eq(t).removeClass("fa-star-o").addClass("fa-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("i").eq(t).removeClass("fa-star").addClass("fa-star-o")}}if(!e){return this.$el.find("i").removeClass("fa-star").addClass("fa-star-o")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

  $('#new-review').autosize({append: "\n"});

  var reviewBox = $('#post-review-box');
  var newReview = $('#new-review');
  var openReviewBtn = $('#open-review-box');
  var closeReviewBtn = $('#close-review-box');
  var ratingsField = $('#ratings-hidden');

  openReviewBtn.click(function(e)
  {
    reviewBox.slideDown(400, function()
      {
        $('#new-review').trigger('autosize.resize');
        newReview.focus();
      });
    openReviewBtn.fadeOut(100);
    closeReviewBtn.show();
  });

  closeReviewBtn.click(function(e)
  {
    e.preventDefault();
    reviewBox.slideUp(300, function()
      {
        newReview.focus();
        openReviewBtn.fadeIn(200);
      });
    closeReviewBtn.hide();
    
  });

  $('.starrr').on('starrr:change', function(e, value){
    ratingsField.val(value);
  });
});
</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 1) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
});

</script>
