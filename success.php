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
$salt=$system_sault;

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||'.$orderid.'|'.$userid.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||'.$orderid.'|'.$userid.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
		 
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   }
	   else {
           $orderno=$_SESSION['ordar_no'];
           $user_id= $_SESSION['client_id'];
           	   $GFH_Admin->setPaymentDetail($txnid,$firstname,$amount,$email,$status,$paymentdetail,$orderid);
               $sql= mysqli_query(GFHConfig::$link,"UPDATE `product_order` SET  `payment_status`='Paid', `delivery_status`='Pending' WHERE `order_id`='$orderno'");
           mysqli_query(GFHConfig::$link,"DELETE FROM `temp_cart` WHERE `user_id`='$user_id'");
           if($sql){session_start();

          echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
          echo "<a href='index.php'>Order More.</a>";



               $to = $_POST['email'];
               $subject = $system_name.': Ordar Confirmation from Fabiano'.$system_name;
               $header = $system_name.": Ordar Confirmation from".$system_name;
               $message = "Thank You. Your order no is #". $_SESSION['ordar_no'] .".";
               $message .="Your Transaction ID for this transaction is ".$txnid.".";
               $message .="We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.";
               $sentmail = mail($to,$subject,$message,$header);

		   }
           unset($_SESSION['ordar_no']);

       }
?>	