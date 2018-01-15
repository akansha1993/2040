<?php include('includes/header.php') ?>
	<!-- sign up-page -->
	<div class="login-page">
		<div class="container"> 
			<h3 class="_winklsls-title _winklsls-title1">Create your account</h3>  
			<div class="login-body">
			 <?php

if(isset($_POST['res_email']) && !empty($_POST['res_password'])){
     $GFH_Admin->client_signup();
}
?>
				<form action="#" method="post">
					<input type="text" class="user" name="name" placeholder="Enter your Name" required="">
					<input type="text" class="user" name="phone" placeholder="Enter your Phone" required="">
					<input type="text" class="user" name="res_email" placeholder="Enter your email" required="">
					<input type="password" name="res_password" class="lock" placeholder="Password" required="">
					<input type="submit" value="Sign Up ">
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
			<h6>Already have an account? <a href="login.html">Login Now »</a> </h6>  
		</div>
	</div>
	<!-- //sign up-page --> 
<?php include('includes/footer.php') ?>