
<?php
    include("grabfone_admin_panel/database/db_connection.php");
	session_start();
    extract($_POST);
	$search1 = $_SESSION['search'];
	 if(isset($price)){		 
		$brand = implode("','" , $price);
		 $sql="SELECT * FROM tbl_addproduct WHERE fld_brand IN ('".$brand."')";
		 }
		 if($price==""){
		$sql = "select * from tbl_addproduct where fld_productname LIKE  '%".$search1."%'";
  }
	
		$all_row=mysqli_query($con,$sql) or die(mysql_error());
		if(mysqli_num_rows($all_row)>0){
		
				while($row = mysqli_fetch_array($all_row)){
					
							?>
		<div class="col-md-4 col-lg-4 col-sm-6" id="shop" style="margin-top:3%;" >
                                                        <div class="single-product">
                                                            <div class="product-img">
                                                                <div class="pro-type">
                                                                    
																<!--<span></span>-->
                                                                </div>
                                                                <a href="product_detail.php?id=<?php echo $row['fld_id'];?>&brand=<?php echo $row['fld_brand'];?>">
                                                                    <img src="grabfone_admin_panel/image/primary_image/<?php echo $row['fld_pimage'];?>" alt="Product Title" height="320" />
                                                                    <img class="secondary-image" alt="Product Title" src="grabfone_admin_panel/image/primary_image/<?php echo $row['fld_simage'];?>" height="320">
                                                                </a>
                                                            </div>
                                                            <div class="product-dsc">
                                                                <h3><a href="product_detail.php?id=<?php echo $row['fld_id'];?>&brand=<?php echo $row['fld_brand'];?>"><?php echo $row['fld_productname'];?></a></h3>
                                                                <div class="star-price">
                                                                    <span class='price-left'>
                                                                        Rs<?php echo $row[fld_price];?></span>
																
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
                                                               <!--- <a href="#" data-placement="top" data-target="#quick-view" data-trigger="hover" data-toggle="modal" data-original-title="Quick View"><i class="fa fa-eye"></i></a>--->
                                                                <!--<a data-placement="top" data-toggle="tooltip" href="#" data-original-title="Add To Wishlist"><i class="fa fa-heart"></i></a>-->
                                           <!-- <a onclick="cart('add','<?php echo $row['fld_code']; ?>','1')" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>-->
                                                            </div>
                                                        </div>
                                                    </div>
		
		<?php }
				}else{?>
				
                <div><img src="img/products/error-500_f9bbb4.png" style="margin-left:29%;"><h4 style="margin-left:38%;">No result found</h4></div>
                
                
                <?php }?>