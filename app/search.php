<?php
require_once('../admin/includes/config.php');
require_once('../admin/includes/function.php');


$product=array();

if(isset($_POST['search'])){

$sql=$GFH_Admin->getproduct_byname($_POST['search']);
while ($na=mysqli_fetch_array($sql))
while($pr=mysqli_fetch_array($sql)){

    $prod['prod_id'] = $pr['prod_id'];
    $prod['prod_name'] = $pr['prod_name'];
   
    array_push($product,$prod);
}


echo json_encode(array('data'=>$product));
}