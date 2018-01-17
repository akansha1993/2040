<?php
require_once('../admin/includes/config.php');
require_once('../admin/includes/function.php');

$GFH_Admin->api_addtocart($_GET['productid'], $_GET['quantity'], $_GET['price'], $_GET['size'], $_GET['session']);
echo json_encode(array('message'=>'success'));
?>