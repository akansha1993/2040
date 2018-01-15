<?php
require_once('../admin/includes/config.php');
require_once('../admin/includes/function.php');

$menu=array();
$category=array();
$subcategory=array();

    $results1=$GFH_Admin->getCategory();
    while($result1=mysqli_fetch_assoc($results1))
    {
        $cat['categoryid']=$result1['category_id'];
        $cat['categoryname']=$result1['category_name'];
        $results2=$GFH_Admin->getsubCategory_by_category($cat['categoryid']);
        while($result2=mysqli_fetch_assoc($results2)){
            $subcat['subcategoryid']=$result2['subcategory_id'];
            $subcat['subcategoryname']=$result2['subcategory_name'];
            array_push($subcategory, $subcat);
            $cat['subcategory'] = $subcategory;
        }
        array_push($category,$cat);
        $menus['category'] = $category;
    }
    array_push($menu,$menus);


echo json_encode(array('mainmenu' => $menu));
mysqli_close($con);




