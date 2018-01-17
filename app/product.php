<?php
require_once('../admin/includes/config.php');
require_once('../admin/includes/function.php');

$cat = $_GET['category'];
$subcat = $_GET['subcategory'];
$product = array();
$sql=mysqli_query($GFH_Admin::$link,"SELECT * FROM `product` where category_id = '" .$cat. "' and subcategory_id = '" .$subcat. "'");
$product = mysqli_fetch_all($sql,MYSQLI_ASSOC);
echo json_encode(array('data'=>$product));
