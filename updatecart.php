<?php
/**
 * Created by PhpStorm.
 * User: uksca
 * Date: 7/13/2017
 * Time: 4:45 PM
 */
 require_once('admin/includes/function.php') ;
//session_start();


if(isset($_POST['cart'])) {

    if(!empty($_POST['quantity'])) {
        $productCode = $GFH_Admin->getproduct($_POST['cart']);
        while(($product = mysqli_fetch_assoc($productCode))){
            $productByCode[] = $product;
        }
        $imgs=explode(",",$productByCode[0]["product_images"]);
        $im=$imgs[0];
        $itemArray = array($productByCode[0]["prod_id"]=>array('product_id'=>$productByCode[0]["prod_id"],'name'=>$productByCode[0]["prod_name"], 'quantity'=>$_POST['quantity'], 'price'=>$productByCode[0]["prod_price"],'img'=>$im));

        if(!empty($_SESSION["cart_item"])) {
            if(in_array($_POST['cart'], array_column($_SESSION['cart_item'], 'product_id'))) { // search value in the array

                foreach ($_SESSION['cart_item'] as $k => $v){
                   if($_SESSION['cart_item'][$k]['product_id'] == $_POST['cart']){
                    $_SESSION['cart_item'][$k]['size']=$_POST['size'];
                    $_SESSION['cart_item'][$k]['quantity']=$_POST['quantity'];
                    $_SESSION['cart_item'][$k]['size']=$_POST['size'];
                    $_SESSION['cart_item'][$k]['price']=$_SESSION['cart_item'][$k]['price'];
                }
            }

            } 
     else {
                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
            }
        }
    else {
            $_SESSION["cart_item"] = $itemArray;
            $msg = "<div class='alert alert-success alert-dismissible' style=' background-color:#cc0000;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong style='color:#fff;font-size:18px;'>Product Addedd Successfully in Your Cart</strong>
</div>";
        }

        if(!empty($_SESSION['client_id'])){
            $GFH_Admin->cart();
        }
    }

}

echo '<div class="counter">'.count($_SESSION['cart_item']).'</div>';

if(isset($_POST['wish_product_id']))
{
    $GFH_Admin->wish();
}


?>