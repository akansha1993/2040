<?php
require_once ('admin/includes/function.php');

$category_id=$_POST['category_id'];

$sql="SELECT * FROM product WHERE category_id='$category_id' ";
 

    $sql .= " AND brand_id IN ('" . implode("','", $_POST['brand']) . "')";
    $sql .= " AND prod_price >='".$_POST['sort_price']."'";
    $all_product = mysqli_query($GFH_Admin::$link, $sql);
    $rowcount = mysqli_num_rows($all_product);
    ?>
    

                    <?php
                    while ($na = mysqli_fetch_array($all_product)) {
                        $img = explode(",", $na['product_images']); ?>
                            <div class="products-row">
                    <div class="col-md-3 product-grids"> 
                        <!-- <button type="button" class="btn btn-primary">On OFfer</button> --><!-- 
                        <h5 style="background: #00796B;width: 60px;padding: 3px 2px 2px 2px;color: #fff;z-index: 2;">On Offer</h5> -->
                        <div class="agile-products" style="height: 215px;"> 
                            <a href="product-overview.php?product=<?php echo $na['prod_id'];?>"><img src="<?php echo url('images/product/'.$na['thumb']);?>" class="img-responsive" alt="img" style="height: 200px;"></a>
                        </div>  
                    </div>  
    
                    <div class="col-md-7 product-grids">

                        <div class="product-spec">
                            <h4><a href="product-overview.php?product=<?php echo $na['prod_id'];?>"><?php echo $na['prod_name'];?></a></h4>

                            <div class="star">
                                 <br>

                                <div class="pull-right"> 
                                <div class="pp">
                                <a href=""><i class="fa fa-inr" aria-hidden="true"><?php echo $na['prod_price'];?></i></a>
                            </div>
                            
                                </div>
                            </div>

<?php echo $na['prod_description'];?></a>
                        </div>
                    </div>
                 
                    <div class="col-md-1"></div>
                     
                    <div class="clearfix"> </div>

                </div>
                    <?php } ?>
 