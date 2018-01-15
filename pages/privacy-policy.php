<?php require_once('../admin/includes/function.php');?>	
<?php require_once 'header.php'; 
 ?>
<!--  about-page -->
	<div class="about">
		<div class="container"> 
		<?php
$na=$GFH_Admin->page_by_name(basename($_SERVER['PHP_SELF']));
echo "<h3 class='_winkls-title _winkls-title1'>".$na['title']."</h3>";
echo $na['description'];

?>	
</div>
</div>
	 
<?php include '../includes/footer.php'; ?>	