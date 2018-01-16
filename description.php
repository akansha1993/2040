<?php include('includes/header.php'); 
$sql=$GFH_Admin->getservice($_GET['service']);
$na=mysqli_fetch_array($sql);
?> 	
	<!-- card-page -->
	<div class="card-page">
		<div class="container"> 
			<h3 class="_winklsls-title _winklsls-title1 text-center">  <?php echo isset($na['headline'])?$na['headline']:''?></h3>
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
			<img src="images/service/<?php echo isset($na['image'])?$na['image']:''?>" style="
    width: 1141px;
">
			<div class="agile-card-text">
				<?php echo isset($na['caption'])?$na['caption']:''?>
			</div>
		</div>
	</div>
	<!-- //card-page --> 
<?php include('includes/footer.php'); ?>