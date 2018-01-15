<?php include('includes/header.php'); ?> 	
	<!-- card-page -->
	<style type="text/css">
		ol.progtrckr {
    margin: 0;
    padding: 0;
    list-style-type none;
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
}


	</style>
	<div class="card-page">
		<div class="container"> 
			<h3 class="_winklsls-title _winklsls-title1 text-center">  Track Your Order</h3>
			<hr>  
			<!-- <div class="agile-card-top">
				<div class="col-md-4 card-top-grids">
					<h4>Save <span>$15</span></h4>
					<i class="fa fa-camera" aria-hidden="true"></i>
					<h5>on purchase of Electronics In </h5>
				</div>
				<div class="col-md-4 card-top-grids">
					<h4>Save <span>$5</span></h4>
					<i class="fa fa-motorcycle" aria-hidden="true"></i>
					<h5>on purchase of  Automotive </h5>
				</div>
				<div class="col-md-4 card-top-grids">
					<h4>Save <span>$20</span></h4>
					<i class="fa fa-users" aria-hidden="true"></i>
					<h5>on purchase of Clothings Using Card</h5>
				</div>
				<div class="clearfix"> </div>
			</div> -->
			<!-- <div class="cust1">
			<h1>1900-5000-8000</h1>
			<div class="bdrr-btm"></div>
			</div> -->
			<div class="agile-card-text">
				<ol class="progtrckr" data-progtrckr-steps="5">
    <li class="progtrckr-done">Order Recived</li><!--
 --><li class="progtrckr-done">Ready To Dispatch</li><!--
 --><li class="progtrckr-done">Dispatch</li><!--
 --><li class="progtrckr-todo">Shipping</li><!--
 --><li class="progtrckr-todo">Delivered</li>
</ol>
			</div>
		</div>
	</div>
	<!-- //card-page --> 
<?php include('includes/footer.php'); ?>