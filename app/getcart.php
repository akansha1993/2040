<?php
require_once('../admin/includes/config.php');
require_once('../admin/includes/function.php');
$session = $_GET['session'];
$cart = $GFH_Admin->api_getcart($session);
echo json_encode(array('message'=>'success','data'=>$cart));
?>