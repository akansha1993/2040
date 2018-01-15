<?php include('includes/header.php'); ?> 	
	<!-- site map -->
	<div class="sitemap">
		<div class="container"> 
			<h3 class="_winklsls-title _winklsls-title1 text-center">All Categories</h3>
			<div class="sitemap-row"> 
				<nav class="sitemap-tabs" data-spy="affix" data-offset-top="400"> 
					<div  id="myNavbar">
						<ul> 
							<li><a href="#_winklssec1"><i class="fa fa-mobile"></i> Category1</a></li>
						</ul> 
					</div>
				</nav>	
				<div id="_winklssec1" class="container-fluid sitemap-text">
					<h3 class="_winklssitemap-title"><i class="fa fa-mobile"></i> Category1</h3>  
					<div class="col-md-12 sitemap-text-grids"> 
						<h5 class="sitemap-text-title"><a href="#">MOBILE PHONES</a></h5> 
						<ul>  
							<li><a href="#">Phones</a></li>
							<li><a href="#">Android</a></li>
							<li><a href="#">Windows</a></li>
							<li><a href="#">Black berry</a></li> 
							<li><a href="#">IPhones</a> </li>
							<li><a href="#">Tablets</a></li>
							<li><a href="#">IPad</a></li>
							<li><a href="#">Feature Phones</a></li>  
							<li><a href="#">Phones</a></li>
							<li><a href="#">Android</a></li>
							<li><a href="#">Windows</a></li>
							<li><a href="#">Black berry</a></li> 
							<li><a href="#">IPhones</a> </li>
							<li><a href="#">Tablets</a></li>
							<li><a href="#">IPad</a></li>
							<li><a href="#">Feature Phones</a></li>  
							<li><a href="#">Phones</a></li>
							<li><a href="#">Android</a></li>
							<li><a href="#">Windows</a></li>
							<li><a href="#">Black berry</a></li> 
							<li><a href="#">IPhones</a> </li>
							<li><a href="#">Tablets</a></li>
							<li><a href="#">IPad</a></li>
							<li><a href="#">Feature Phones</a></li>  
							<li><a href="#">Phones</a></li>
							<li><a href="#">Android</a></li>
							<li><a href="#">Windows</a></li>
							<li><a href="#">Black berry</a></li> 
							<li><a href="#">IPhones</a> </li>
							<li><a href="#">Tablets</a></li>
							<li><a href="#">IPad</a></li>
							<li><a href="#">Feature Phones</a></li>  
							<li><a href="#">Phones</a></li>
							<li><a href="#">Android</a></li>
							<li><a href="#">Windows</a></li>
							<li><a href="#">Black berry</a></li> 
							<li><a href="#">IPhones</a> </li>
							<li><a href="#">Tablets</a></li>
							<li><a href="#">IPad</a></li>
							<li><a href="#">Feature Phones</a></li>  
							<li><a href="#">Phones</a></li>
							<li><a href="#">Android</a></li>
							<li><a href="#">Windows</a></li>
							<li><a href="#">Black berry</a></li> 
							<li><a href="#">IPhones</a> </li>
							<li><a href="#">Tablets</a></li>
							<li><a href="#">IPad</a></li>
							<li><a href="#">Feature Phones</a></li>  
							<li><a href="#">Phones</a></li>
							<li><a href="#">Android</a></li>
							<li><a href="#">Windows</a></li>
							<li><a href="#">Black berry</a></li> 
							<li><a href="#">IPhones</a> </li>
							<li><a href="#">Tablets</a></li>
							<li><a href="#">IPad</a></li>
							<li><a href="#">Feature Phones</a></li>  
							<li><a href="#">Phones</a></li>
							<li><a href="#">Android</a></li>
							<li><a href="#">Windows</a></li>
							<li><a href="#">Black berry</a></li> 
							<li><a href="#">IPhones</a> </li>
							<li><a href="#">Tablets</a></li>
							<li><a href="#">IPad</a></li>
							<li><a href="#">Feature Phones</a></li> 
						</ul> 
					</div>	
					<div class="clearfix"> </div>
				</div>
				</div>
			<script>
			$(document).ready(function(){
			  // Add scrollspy to <body>
			  $('body').scrollspy({target: ".sitemap-tabs", offset: 50});

			  // Add smooth scrolling on all links inside the navbar
			  $("#myNavbar a").on('click', function(event) {
				// Make sure this.hash has a value before overriding default behaviour
				if (this.hash !== "") {
				  // Prevent default anchor click behaviour
				  event.preventDefault();

				  // Store hash
				  var hash = this.hash;

				  // Using jQuery's animate() method to add smooth page scroll
				  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
				  $('html, body').animate({
					scrollTop: $(hash).offset().top
				  }, 800, function(){
			   
					// Add hash (#) to URL when done scrolling (default click behaviour)
					window.location.hash = hash;
				  });
				}  // End if
			  });
			});
			</script> 
			</div>
	</div>
	<!-- //site map --> 
<?php include('includes/footer.php'); ?>