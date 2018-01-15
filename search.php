<?php require_once ('admin/includes/function.php');
$sql=$GFH_Admin->getproduct_bynamecate($_GET['search']);
while ($na=mysqli_fetch_array($sql))
{?><li style="padding: 6px 6px 6px 6px;float: left;"> <a href="product-overview.php?product=<?php echo $na['prod_id'];?>" style="width: 100%;float: left;font-size: 15px;color: #000;"><?php echo $na['prod_name'];?></a> </li>
<?php }

?>