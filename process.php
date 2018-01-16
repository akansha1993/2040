
<?php require_once('admin/includes/config.php');
require_once('admin/includes/function.php');
session_start();

$ord=$GFH_Admin->get_order($_SESSION['order_no']);
$orderinfo=mysqli_fetch_array($ord);

$clinet=$GFH_Admin->getclient($_SESSION['client_id']);
$cl=mysqli_fetch_array($clinet);


$MERCHANT_KEY = "bfFhnCQQ";


$SALT = "0iwdy1zBk1";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";
//$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';
$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$posted = array();
$posted['key'] = $MERCHANT_KEY;
$posted['txnid'] = $txnid;
$posted['amount'] = $orderinfo['amount'];
$posted['firstname'] = $cl['fullname'];
$posted['email'] = $cl['email'];
$posted['phone'] = $cl['phone'];
$posted['productinfo'] = "Health Care Products";
$posted['surl'] = "http://localhost/success.php";
$posted['furl'] = "http://localhost/failure.php";
$posted['service_provider'] = "payu_paisa";

$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));

    $action = $PAYU_BASE_URL . '/_payment';

  $action = $PAYU_BASE_URL . '/_payment';

?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
<div class="wating_box"> <p>Do not refresh the page</p><p>Please Wait....</p></div>
    <div >
    <h2>Payment Process</h2>
    <br/>
    <form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input type="hidden" name="amount" value="<?php echo isset($orderinfo['amount'])?$orderinfo['amount']:''; ?>" />
      <input type="hidden" name="email" value="<?php echo isset($cl['email'])?$cl['email']:''; ?>" />
      <input type="hidden" name="firstname" id="firstname" value="<?php echo isset($cl['fullname'])?$cl['fullname']:''; ?>" />
      <input type="hidden" name="phone" value="<?php echo isset($cl['phone'])?$cl['phone']:''; ?>" />
       <input type="hidden" name="productinfo" value="Health Care Products">
       <input type="hidden" name="surl" value="http://localhost/success.php" size="64" />
       <input type="hidden" name="furl" value="http://localhost/failure.php" size="64" />
       <input type="hidden" name="service_provider" value="payu_paisa" size="64" />

       <?php if(!$hash) { ?>
            <input type="submit" value="Submit" />
          <?php } ?>
    </form>
    </div>
  </body>
</html>
