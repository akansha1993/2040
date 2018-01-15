<?php
include("grabfone_admin_panel/database/db_connection.php");
//ob_start();
$content_per_page = 10;	
$start = $content_per_page;
$sql= "SELECT distinct * FROM `tbl_addproduct` WHERE fld_brand='Old Phones'";
    if(isset($_POST['brandsize']) && $_POST['brandsize']!="")
	{
		$size = implode(',',$_POST['brandsize']);	
	    $sql.="AND fld_category IN ('".implode("','",$_POST['brandsize'])."')";
	        /*if(isset($_POST['sort_filter']) && $_POST['sort_filter']!="")
			 {
				  if($_POST['sort_filter']=='low')
				    {
					$sql.="order by fld_price";
				    }
				  elseif($_POST['sort_filter']=='high')
					{
					$sql.="order by fld_price desc";
					}
			 }*/
			 
	}
	
	
     if(isset($_POST['sort_price']) && $_POST['sort_price']!="") :
		$split =explode("-",$_POST['sort_price']);
		$min= $split[0];
		$max = $split[1];
	    $sql.="AND fld_price BETWEEN '".$min."' AND '".$max."'";
	endif;
	if(isset($_POST['sort_filter']) && $_POST['sort_filter']!=""):
	   if($_POST['sort_filter']=='low')
	    $sql.="order by fld_price asc";
		if($_POST['sort_filter']=='high')
	    $sql.="order by fld_price desc";
	endif;
	$sql.=" LIMIT $start";
	$all_product=mysqli_query($con,$sql);
    $rowcount=mysqli_num_rows($all_product);

		/*echo $sql;
die;*/
	
?>
<div class="tab-content divchnge">
        <div role="tabpanel" class="tab-pane active" id="home">
            <div class="row">
                <div class="shop-tab">
					<div class="ajax_result">
						<?php
							/*$query = "SELECT count(fld_id) as count from tbl_addproduct where fld_brand='Old Phones'";										
							$count_record = mysqli_query($con,$query) or die(mysql_error());
							$count_row = mysqli_fetch_assoc($count_record) or die(mysql_error());
							$count_record = $count_row['count'];
							$per_page=12;
							$page=ceil($count_record/$per_page);
							if(isset ($_GET['page'])){
								$page_no=$_GET['page'];
							}
							else{
								$page_no=1;
							}
							$start_limit=($page_no-1)*$per_page;*/												
						?>
						<!-- single-product start -->
						<form method="post" action="">
							<?php
								//$product = mysqli_query($con,"select * from tbl_addproduct where fld_brand='Old Phones'");													 
								while($fetch1 = mysqli_fetch_array($all_product)){					
							?>
									<div class="col-md-4 col-lg-4 col-sm-6 carts">
										<div class="single-product carts">
											<div class="product-img">
												<a href="product_detail.php?id=<?php echo $fetch1['fld_id'];?>&brand=<?php echo $fetch1['fld_brand'];?>">
													<img src="grabfone_admin_panel/image/primary_image/<?php echo $fetch1['fld_pimage'];?>" alt="<?php echo $fetch1['fld_productname'];?>" height="320" />
													<img class="secondary-image" alt="Product Title" src="grabfone_admin_panel/image/primary_image/<?php echo $fetch1['fld_simage'];?>" height="320">
												</a>
											</div>
											<div class="product-dsc">
												<h3><a href="product_detail.php?id=<?php echo $fetch1['fld_id'];?>&brand=<?php echo $fetch1['fld_brand'];?>"><?php echo substr($fetch1['fld_productname'],0,30);?>	</a></h3>
												<div class="star-price">
													<span class="price-left">Rs<?php echo $fetch1['fld_price'];?></span>
													<span><input type='hidden' name='quantity' value='1'></span>
													<span class="star-right">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-o"></i>
													</span>
												</div>
											</div>
											<div class="actions-btn">
												<button type='submit'  class='btn btn-danger g6' name='wish' value='<?php echo $fetch1['fld_code'];?>' title='Add To Wishlist' style='display: none;'><i class='fa fa-heart'></i></button>
												<button type='submit'  class='btn btn-danger g6' name='cart' value='<?php echo $fetch1['fld_code'];?>' title='Add To Cart' style='display: none;'><i class='fa fa-shopping-cart'></i></button>
											</div>
										</div>
									</div>
								<?php }
							?>
						</form>                                                                                                       </div>
					</div>
				</div>
			</div>                                        
		</div>
		<div class="shop-all-tab-cr shop-bottom">
			<div class="two-part">
				<div class="shop5 page">
					<ul>
						<li>
							<?php
							if(isset($page))
								for($i=1;$i<=$page;$i++){
							?>
								
							<a class="<?php if($_GET['page']==$i) {echo "active"; } else  {echo "noactive";}?>" href="old_phone.php?page=<?php echo $i;?>"><?php echo $i;?></a>
							<?php } ?>
							
						</li>
					</ul>        
				</div>
			</div>
		</div>
	</div>

<?php

/*$result=ob_get_contents();
ob_clean();
echo $all_product;
die;*/