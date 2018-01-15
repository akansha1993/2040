<?php
require_once('../admin/includes/config.php');
require_once('../admin/includes/function.php');

$response=array();
$category=array();
$product=array();


$sql=mysqli_query($GFH_Admin::$link,"SELECT * FROM `product` ORDER BY created_on DESC LIMIT 10");
while($pr=mysqli_fetch_array($sql)){
    $prod['prod_id'] = $pr['prod_id'];
    $prod['category_name'] = 'trending';
    $prod['subcategory_id'] = $pr['subcategory_id'];
    $prod['mrate'] = $pr['mrate'];
    $prod['prod_name'] = $pr['prod_name'];
    $prod['prod_price'] = $pr['prod_price'];
    $prod['prod_description'] = $pr['prod_description'];
    $prod['prod_specification'] = $pr['prod_specification'];
    $prod['prod_features'] = $pr['prod_disclamer'];
    $prod['product_images'] = $pr['product_images'];
    $prod['tags'] = $pr['tags'];
    array_push($product,$prod);
}


$c=$GFH_Admin->getCategory();
while($cate=mysqli_fetch_assoc($c))
{
    $cat['categoryid']=$cate['category_id'];
    $p=$GFH_Admin->getproduct_bycate($cat['categoryid']);
    while($na=mysqli_fetch_assoc($p)){

       $prod['prod_id'] = $na['prod_id'];
        $prod['category_name'] = $cate['category_name'];
        $prod['subcategory_id'] = $na['subcategory_id'];
        $prod['mrate'] = $na['mrate'];
        $prod['prod_name'] = $na['prod_name'];
        $prod['prod_price'] = $na['prod_price'];
        $prod['prod_description'] = $na['prod_description'];
        $prod['prod_specification'] = $na['prod_specification'];
        $prod['prod_features'] = $na['prod_disclamer'];
        $prod['product_images'] = $na['product_images'];
        $prod['tags'] = $na['tags'];
       


        array_push($product, $prod);
      
    }

}
echo json_encode(array('data'=>$product));
