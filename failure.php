<?php
require_once('admin/includes/function.php');
global $GFH_Admin;

$paymentdetail=json_encode($_REQUEST);
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];

$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$userid=$_POST["udf1"];
$orderid=$_POST["udf2"];
$salt=$system_sault;?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $system_name;?> || Checkout</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  css links-->
    <?php include("include/css_link.php");?>
    <!-- css links-->

    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="js/jquery.min.js" ></script>

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- header section start -->
<header class="pages-header">

    <?php include("include/header.php");?>
</header>

<!-- pages-title-end -->

<section>
    <div class="container" style="width: 100% ; height: 400px;">
        <link rel="stylesheet" href="css/style.css">
        <div class="col-xs-12 col-md-8 items-holder" style="top: 200px;">
<?php

if (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||'.$orderid.'|'.$userid.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||'.$orderid.'|'.$userid.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
           $ordar_no= $_SESSION['ordar_no'];
           mysqli_query(GFHConfig::$link,"DELETE FROM `product_order` WHERE `order_id` ='$ordar_no'");
           mysqli_query(GFHConfig::$link,"DELETE FROM `shopping_cart` WHERE `order_no` ='$ordar_no'");
           unset($_SESSION['ordar_no']);
	       echo "Invalid Transaction. Please try again";
		   }
	   else {
          $ordar_no= $_SESSION['ordar_no'];
           $GFH_Admin->setPaymentDetail($txnid,$firstname,$amount,$email,$status,$paymentdetail,$ordar_no);
           mysqli_query(GFHConfig::$link,"DELETE FROM `shopping_cart` WHERE `order_no` ='$ordar_no'");
           unset($_SESSION['ordar_no']);
         echo "<h3>Your order status is ". $status .".</h3>";
         echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
          
		 } 
?>
<!--Please enter your website homepagge URL -->
<p><a href="index.php"> Try Again</a></p>
    </div>
    </div>

</section>
<?php include("include/footer.php");?>
</body>

</html>
