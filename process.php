
<?php require_once('admin/includes/config.php');
require_once('admin/includes/function.php');
session_start();

$ord=$GFH_Admin->get_order($_SESSION['order_no']);
$orderinfo=mysqli_fetch_array($ord);

$clinet=$GFH_Admin->getclient($_SESSION['client_id']);
$cl=mysqli_fetch_array($clinet);


$MERCHANT_KEY = $system_marchant;

// Merchant Salt as provided by Payu
$SALT = $system_sault;


//$MERCHANT_KEY = "bfFhnCQQ";

// Merchant Salt as provided by Payu
//$SALT = "0iwdy1zBk1";

// End point - change to https://secure.payu.in for LIVE mode
//$PAYU_BASE_URL = "https://test.payu.in";
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {

  foreach($_POST as $key => $value) {
    $posted[$key] = $value;

  }

}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;

  } else {
    //echo "<pre>";print_r($posted);die;
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));

    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
 //echo "<pre>";print_r($hash);die;
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
  <style>
          /*body {background: #fafafa none repeat scroll 0 0;  height: 100%;  margin: 0;  overflow: hidden;  padding: 0;  width: 100%; }*/
          /*.wating_box { color: #000; font-size: 19px; margin: 20% auto 0; text-align: center;  width: 275px;}*/
          /*.wating_box p { margin: 0; padding: 5px;}*/

      </style><div class="wating_box"> <p>Do not refresh the page</p><p>Please Wait....</p></div>
    <div >
    <h2>Payment Process</h2>
    <br/>
    <?php if($formError) { ?>

      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input type="hidden" name="amount" value="<?php echo isset($orderinfo['amount'])?$orderinfo['amount']:''; ?>" />
      <input type="hidden" name="email" value="<?php echo isset($cl['email'])?$cl['email']:''; ?>" />
      <input type="hidden" name="firstname" id="firstname" value="<?php echo isset($cl['fullname'])?$cl['fullname']:''; ?>" />
      <input type="hidden" name="phone" value="<?php echo isset($cl['phone'])?$cl['phone']:''; ?>" />
       <input type="hidden" name="productinfo" value="Register company BY fabianoappliances.com">
       <input type="hidden" name="surl" value="http://localhost/grabfone/success.php" size="64" />
       <input type="hidden" name="furl" value="http://localhost/grabfone/failure.php" size="64" />
       <input type="hidden" name="service_provider" value="payu_paisa" size="64" />

       <?php if(!$hash) { ?>
            <input type="submit" value="Submit" />
          <?php } ?>
    </form>
    </div>
  </body>
</html>
<script src='js/jquery-1.11.1.min.js'></script>
<script type="text/javascript">

    $(document).ready(function(){ $("#payuForm").submit(); });
</script>