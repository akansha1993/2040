<?php
require_once('../admin/includes/config.php');
require_once('../admin/includes/function.php');
$category=array();
$c=$GFH_Admin->getCategory();
while($cate=mysqli_fetch_assoc($c))
{
    $category[$cate['category_id']]=$cate;
    $sub=$GFH_Admin->getsubCategory_by_category($cate['category_id']);
    $subcat = mysqli_fetch_all($sub,MYSQLI_ASSOC);
    $category[$cate['category_id']]['subcategory'] = $subcat;
}
echo json_encode(array('message'=>'success','data'=>$category));
?>