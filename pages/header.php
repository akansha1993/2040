 

<!DOCTYPE html>
<html lang="en">
<head>
<title>Medical Store</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Keyword Paste Here" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="<?php echo url('assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo url('assets/css/style.css');?>" rel="stylesheet" type="text/css" media="all" /> 
<link href="<?php echo url('assets/css/menu.css');?>" rel="stylesheet" type="text/css" media="all" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /><!-- menu style --> 
<link href="<?php echo url('assets/css/ken-burns.css');?>" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider --> 
<link href="<?php echo url('assets/css/animate.min.css');?>" rel="stylesheet" type="text/css" media="all" /> 
<link href="<?php echo url('assets/css/owl.carousel.css');?>" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
<link href="<?php echo url('assets/css/font-awesome.css');?>" rel="stylesheet"> 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="<?php echo url('assets/js/jquery-2.2.3.min.js');?>"></script>
<script type= "text/javascript" src = "<?php echo url('assets/js/countries.js');?>"></script> 
<!-- //js --> 
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<!-- web-fonts --> 
<script src="<?php echo url('assets/js/owl.carousel.js');?>"></script>  
<script>
$(document).ready(function() { 
	$("#owl-demo").owlCarousel({ 
	  autoPlay: false, //Set AutoPlay to 3 seconds 
	  items :4,
	  itemsDesktop : [640,5],
	  itemsDesktopSmall : [480,2],
	  navigation : true
 
	}); 
}); 
</script>
<script src="<?php echo url('assets/js/jquery-scrolltofixed-min.js');?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner. This is the default behaviour.

        $('.header-two').scrollToFixed();  
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header-two').outerHeight(true) + 10, 
                zIndex: 999
            });
        });
    });
</script>
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="<?php echo url('assets/js/move-top.js');?>"></script>
<script type="text/javascript" src="<?php echo url('assets/js/easing.js');?>"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('php,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
<script src="<?php echo url('assets/js/bootstrap.js');?>"></script>	
<!-- the jScrollPane script -->
<script type="text/javascript" src="<?php echo url('assets/js/jquery.jscrollpane.min.js');?>"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- //the jScrollPane script -->
<script type="text/javascript" src="<?php echo url('assets/js/jquery.mousewheel.js');?>"></script>
<!-- the mousewheel plugin --> 

<!--flex slider-->
<script defer src="<?php echo url('assets/js/jquery.flexslider.js');?>"></script>
<link rel="stylesheet" href="<?php echo url('assets/css/flexslider.css');?>" type="text/css" media="screen" />
<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
	});
</script>
<!--flex slider-->
<script src="<?php echo url('assets/js/imagezoom.js');?>"></script>
</head>
<body>
	<div class="agileits-modal modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa fa-map-marker" aria-hidden="true"></i> Location</h4>
				</div>
				<div class="modal-body modal-body-sub"> 
					<h5>Select your delivery location </h5>  
					<select id="country" name ="country"  class="form-control bfh-states" data-country="US" data-state="CA"></select>
					<h5>Select your delivery location </h5>
					<select name ="state" class="form-control bfh-states" id ="state"></select>
					<!-- <input type="text" name="Name" placeholder="Enter your area / Landmark / Pincode" required=""> -->
					<button type="button" class="close2">Submit</button>
					<a href="#" data-dismiss="modal">Skip & Explore</a>
					<!-- <button type="button" class="close2" data-dismiss="modal" aria-hidden="true">Skip & Explore</button> -->
				</div>
			</div>
		</div>
	</div> 
	<!-- header -->
	<div class="header">
		<div class="_winkls-header"><!--header-one--> 
			<!-- <div class="_winkls-header-left">
				<p><a href="#">14 Days Replacement Policy</a></p>
			</div> -->
<div class="header-logo">
					<h1><a href="index.php"><img src="<?php echo url('images/system/'.$system_logo);?>" class="logo_cion"></a></h1>
				</div>
			<div class="_winkls-header-right">
				<ul>
					<li class="dropdown head-dpdn">
						<a href="join.php" class="dropdown-toggle" ><i class="fa fa-handshake-o" aria-hidden="true"></i>Join 2040</a>
					</li>
					<li class="dropdown head-dpdn">
						<a href="track.php" class="dropdown-toggle" ><i class="fa fa-map-marker" aria-hidden="true"></i>Track</a>
					</li>
					<li class="dropdown head-dpdn">
						<a href="customer_care.php" class="dropdown-toggle" ><i class="fa fa-headphones" aria-hidden="true"></i>24X7 Customer Care</a>
					</li>
					<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle"  data-toggle="modal" data-target="#getapp"><i class="fa fa-android" aria-hidden="true"></i>Get The App</a>
					</li>
					<li class="dropdown head-dpdn">
						<a href="contact.php" class="dropdown-toggle"><i class="fa fa-phone" aria-hidden="true"></i>Connect With Us</a>
					</li> 
					<!-- <li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle"><i class="fa fa-map-marker" aria-hidden="true"></i> Store Finder</a>
					</li> -->
					<li class="dropdown head-dpdn">
						<a href="help.php" class="dropdown-toggle"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div> 
		</div>
		<div class="header-two"><!-- pardeep header-two -->
			<div class="container">

<div class="header-three">
			<div class="">
				<div class="menu">
					<div class="cd-dropdown-wrapper">
						<a class="cd-dropdown-trigger shop_cat" href="#0"><p>Shop By</p> Category <span class="caret"></span> </a>
						<nav class="cd-dropdown"> 
							<div class="arrow"></div>
							<a href="#0" class="cd-close">Close</a>
							<ul class="cd-dropdown-content"> 
								<li><a href="#">Today's Offers</a></li>
								<?php $category=$GFH_Admin->getCategory();
												while($na=mysqli_fetch_array($category)){?>
												<li class="has-children">
									<a href="#"><?php echo $na['category_name'];?></a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										
										<li class="has-children">
											 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#">All Category</a></li> 
												<?php $subcategory=$GFH_Admin->getsubCategory_by_category($na['category_id']);
												while($naa=mysqli_fetch_array($subcategory)){?>
												<li> <a href="products.php?cate=<?php echo $na['category_id'];?>&subcate=<?php echo $naa['subcategory_id'];?>"><?php echo $naa['subcategory_name'];?></a> </li>
												<?php } ?>
												
											</ul>
										</li>
									</ul> 
									<?php } ?> 
								</li>  
							</ul> 
						</nav> 
					</div> 	 
				</div>
			</div>
		</div>


				<div class="header-search">
				 <form action="#" method="get">
						<input type="search" id="search" name="Search" placeholder="Search for a Product..."   onkeyup="search5(this.value);">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<i class="fa fa-search" aria-hidden="true"> </i>
						</button>
						</form> 
                            <ul class="" id="search_result"style="max-height: 250px;width: 625px !important;position: absolute;background-color: white;/* width: auto; */overflow-x: visible;overflow-y: scroll;height: auto;margin: 0px 0px 0px 0px;list-style: none;">
                            	
                            </ul>
						<!-- <div class="top_anchor">



						



						<a href="#">Home</a>
						<a href="#">About Us</a>
						<a href="contact.php">Area Of Opeartion</a>
						<a href="faq.php">FAQ</a>
						<a href="#">Free Shipping</a>
						<a href="#" onClick="alert('Blog Page')">Blog</a>
						<a href="#">Join 2040</a>
						</div> -->
					 
				</div>
				<div class="header-cart"> 
					<div class="my-account">
						<ul class="my_acnt">
							<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> My Account<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<?php if(empty($_SESSION['client_id'])){?>
							<li><a href="login.php">Login </a></li> 
							<li><a href="signup.php">Sign Up</a></li> 
							<?php }else{?>
							<li><a href="dashboard.php">My Account</a></li>  
							<li><a href="?logout">Logout</a></li>  
							<?php } ?>
						</ul> 
					</li>
						</ul>						
					</div>
					<div class="get_app">
						<img class="img-responsive" src="assets/images/app.png">
					</div>
					<div class="cart"> 
						<form action="cart.php" method="post" class="last"> 
							<input type="hidden" name="cmd" value="_cart" />
							<input type="hidden" name="display" value="1" />
							<a href="cart.php"><button class="_winkview-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"  id="cart_count"><?php if(!empty($_SESSION['cart_item'])){?><div class="counter"><?php echo count($_SESSION['cart_item']);?></div><?php } ?></i></button></a>
						</form>  
					</div>
					<div class="clearfix"> </div> 
				</div> 
				<div class="clearfix"> </div>
			</div>		
		</div><!-- //header-two -->
		
	</div>
	<!-- //header -->
