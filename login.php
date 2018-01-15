<?php include('includes/header.php') ?>
	<!-- login-page -->
	<div class="login-page">
		<div class="container"> 
			<h3 class="_winklsls-title _winklsls-title1">Login to your account</h3>  
			<div class="login-body">
				<?php if(isset($_POST['email']) && !empty($_POST['password']) && !empty($_POST['email'])) {
					$GFH_Admin->client_login();
				}?>
				<form action="#" method="post">
					<input type="text" class="user" name="email" placeholder="Enter your email" required="">
					<input type="password" name="password" class="lock" placeholder="Password" required="">
					<input type="submit" value="Login">
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
			<h6> Not a Member? <a href="signup.php">Sign Up Now »</a> </h6> 
			<div class="login-page-bottom social-icons">
				<h5>Recover your social account</h5>
         <ul>
            <li><a href="<?php echo $system_fb; ?>" class="icon fa facebook"><i class="fa fa-facebook"></i> </a></li>
            <li><a href="<?php echo $system_twitter; ?>" class="fa twitter icon twitter"><i class="fa fa-twitter"></i> </a></li>
            <li><a href="<?php echo $system_google; ?>" class="icon fa google-plus"><i class="fa fa-google-plus"></i> </a></li>
            <li><a href="<?php echo $system_linkedin; ?>" class="icon fa dribbble"><i class="fa fa-dribbble"></i> </a></li>
            <li><a href="<?php echo $system_fb; ?>" class="icon fa rss"><i class="fa fa-rss"></i> </a></li>
         </ul> 
			</div>
		</div>
	</div>
	<!-- //login-page -->  
<?php include('includes/footer.php') ?>