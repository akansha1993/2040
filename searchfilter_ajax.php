<?php
include("grabfone_admin_panel/database/db_connection.php");
session_start();
$search1 = $_SESSION['search'];
$start = 10;
$sql= "SELECT distinct * FROM `tbl_addproduct`  WHERE fld_productname LIKE  '%".$search1."%'";
    if(isset($_POST['category']) && $_POST['category']!="")
	{	
	    $sql.="AND fld_brand IN ('".implode("','",$_POST['category'])."')";
	       
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
    //$rowcount=mysqli_num_rows($all_product);

		/*echo $sql;
die;
*/?>

<div class="tab-content divchnge">
                                        <div role="tabpanel" class="tab-pane active" id="home">
                                            <div class="row">
                                                <div class="shop-tab">
                                                    <!-- single-product start -->
													
													<div class="ajax_result">
													<?php
													
                                                     if(mysqli_num_rows($all_product)>0){
													while($fetch1 = mysqli_fetch_array($all_product)){
 
													?>
														<div class="col-md-4 col-lg-4 col-sm-6" id="shop" style="margin-top:3%;" >
															<div class="single-product">
																<div class="product-img">
																	<div class="pro-type">
																		<!--<span></span>-->
																	</div>
																	<a href="product_detail.php?id=<?php echo $fetch1['fld_id'];?>&brand=<?php echo $fetch1['fld_brand'];?>">
																		<img src="grabfone_admin_panel/image/primary_image/<?php echo $fetch1['fld_pimage'];?>" alt="Product Title" height="320" />
																		<img class="secondary-image" alt="Product Title" src="grabfone_admin_panel/image/primary_image/<?php echo $fetch1['fld_simage'];?>" height="320">
																	</a>
																</div>
																<div class="product-dsc">
																	<h3><a href="product_detail.php?id=<?php echo $fetch1['fld_id'];?>&brand=<?php echo $fetch1['fld_brand'];?>"><?php echo $fetch1['fld_productname'];?>	</a></h3>
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
														
                                                          } 
													 else{?>
                                                     <div><img src="img/error-500_f9bbb4.png" style="margin-left:29%;"><h4 style="margin-left:38%;">No result found</h4></div>
                
                
                <?php }?>
													
                                                   		</div>                                                  
                                                </div>
                                                 <!-- single-product end -->	
                                            </div>
                                        </div>
									
										
                                        
                                    </div>
		
        </div>
	</div>

<?php

/*$result=ob_get_contents();
ob_clean();
echo $all_product;
die;*/