<!-- subscribe -->
<div class="subscribe">
   <div class="container">
      <div class="col-md-6 social-icons _wink-agile-icons">
         <h4>Keep in touch</h4>
         <ul>
            <li><a href="<?php echo $system_fb; ?>" class="fa fa-facebook icon facebook"> </a></li>
            <li><a href="<?php echo $system_twitter; ?>" class="fa fa-twitter icon twitter"> </a></li>
            <li><a href="<?php echo $system_google; ?>" class="fa fa-google-plus icon googleplus"> </a></li>
            <li><a href="<?php echo $system_linkedin; ?>" class="fa fa-dribbble icon dribbble"> </a></li>
            <li><a href="<?php echo $system_fb; ?>" class="fa fa-rss icon rss"> </a></li>
         </ul>
         <ul class="apps">
            <li>
               <h4>Download Our app : </h4>
            </li>
            <li><a href="#" class="fa fa-apple"></a></li>
            <li><a href="#" class="fa fa-windows"></a></li>
            <li><a href="#" class="fa fa-android"></a></li>
         </ul>
      </div>
      <div class="col-md-6 subscribe-right">
         <h4>Sign up for email and get 25%off!</h4>
         <form action="#" method="post"> 
            <input type="text" name="email" placeholder="Enter your Email..." required="">
            <input type="submit" value="Subscribe">
         </form>
         <div class="clearfix"> </div>
      </div>
      <div class="clearfix"> </div>
   </div>
</div>
<!-- //subscribe --> 

<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-info _wink-agileits-info">
				<div class="col-md-12 address-right">
					<div class="col-md-3 footer-grids">
						<h3>Get to Know Us</h3>
						<ul>
							<li><a href="<?php echo url('pages/about.php');?>">About Us</a></li>
							<li><a href="#">Career</a></li>
							<li><a href="#">Investor Relation</a></li>  
							<li><a href="#">Affliate Marketing</a></li>  
							<li><a href="#">Return Policy</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-grids">
						<h3>Company</h3>
						<ul>
							<li><a href="<?php echo url('pages/about.php');?>">About Us</a></li>
							<li><a href="#">Marketplace</a></li>  
							<li><a href="#">Core Values</a></li>  
							<li><a href="<?php echo url('pages/privacy-policy.php');?>">Privacy Policy</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-grids">
						<h3>Services</h3>
						<ul>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Returns</a></li> 
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Site Map</a></li>
							<li><a href="#">Track</a></li>
						</ul> 
					</div>
					<div class="col-md-3 footer-grids">
						<h3>Payment Methods</h3>
						<ul>
							<li><img class="img-responsive" src="<?php echo url('assets/images/card.png'); ?>"></li>
						</ul>  
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //footer -->		
	<div class="copy-right"> 
		<div class="container">
			<p>© <?php echo date('Y');?> - Healthcare. All rights reserved </p>
		</div>
	</div> 
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
	<!-- //cart-js -->	
	<!-- countdown.js -->	
	<script src="<?php echo url('assets/js/jquery.knob.js');?>"></script>
	<script src="<?php echo url('assets/js/jquery.throttle.js');?>"></script>
	<script src="<?php echo url('assets/js/jquery.classycountdown.js');?>"></script>

<script>
    $(document).ready(function(){
        $('#search').focus(function(){
            $('#search_result').fadeIn(1000);
        }).focusout(function(){
            $('#search_result').fadeOut(1000);
        });
    });
</script>
<!-- get app pop up -->
<div id="getapp" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Get The App</h4>
      </div>
      <div class="modal-body">
        <h1>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make</h1>
<form>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
  <input type="text" name="Get App" class="form-control" placeholder="Enter Email To Get App" >
  <span class="input-group-addon inp_grp"><button type="Submit">Submit</button></span>
</div>
</form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <img class="img-responsive" src="<?php echo url('assets/images/app_store.png');?>">
        <div class="android"></div>
        <div class="ios"></div>
      </div>
    </div>

  </div>
</div>
<!-- /get app pop up -->

		<script>
			$(document).ready(function() {
				$('#countdown1').ClassyCountdown({
					end: '1388268325',
					now: '1387999995',
					labels: true,
					style: {
						element: "",
						textResponsive: .5,
						days: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#1abc9c",
								lineCap: 'round'
							},
							textCSS: 'font-weight:300; color:#fff;'
						},
						hours: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#05BEF6",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						},
						minutes: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#8e44ad",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						},
						seconds: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#f39c12",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						}

					},
					onEndCallback: function() {
						console.log("Time out!");
					}
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
    $('#myCarousel').carousel({
        interval: false
    })
    $('.fdi-Carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
});
       function search5(name) {
       
            $.ajax({
                type:"GET",
                url: "search.php?search="+name,
                success:function (data) {
                     document.getElementById('search_result').innerHTML = data;

                }
            });
        }
		</script>
		<script type="text/javascript">
			// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});

$( document ).ready(function() {
      
  $('#stars').on('starrr:change', function(e, value){
    $('#count').php(value);
  });
  
  $('#stars-existing').on('starrr:change', function(e, value){
    $('#count-existing').php(value);
  });
});
		</script>
		<script language="javascript">
	populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
	populateCountries("country2");
	populateCountries("country2");
</script>
	<!-- //countdown.js -->
	<!-- menu js aim -->
	<script src="<?php echo url('assets/js/jquery.menu-aim.js');?>"> </script>
	<script src="<?php echo url('assets/js/main.js');?>"></script> <!-- Resource jQuery -->
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster --> 
<script>
    $(document).ready(function (e) {
        $('.brand, #sort_price, #sort_filter').on('click', function (e) {
            var brand = new Array();
            var sort_price = $('input[name="sort_price"]:checked').val();
            var sort_filter = $('#sort_filter').val();
            $('input[name="brand"]:checked').each(function () {
                brand.push(this.value);
            });
            //alert(sort_price);
            $.ajax({
                type: 'post',
                url: 'sort-product.php',
                data: {brand: brand, sort_price: sort_price, sort_filter: sort_filter,category_id: '<?php echo base64_decode($_GET['cate']);?>'},
                success: function (result) {

                    $('.divchnge').html(result);

                }
            });

        });
    });

  
</script>
    
</body>
</html>