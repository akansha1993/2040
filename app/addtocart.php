<?php
require_once('../admin/includes/config.php');
require_once('../admin/includes/function.php');
$category=array();
$c=$GFH_Admin->getCategory();
$i = 0;
while($cate=mysqli_fetch_assoc($c))
{
    $category[$i]=$cate;
    $sub=$GFH_Admin->getsubCategory_by_category($cate['category_id']);
    $subcat = mysqli_fetch_all($sub,MYSQLI_ASSOC);
    $category[$i]['subcategory'] = $subcat;
    $i++;
}
echo json_encode(array('message'=>'success','data'=>$category));
?>