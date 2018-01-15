<?php require_once ('admin/includes/function.php');?>

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
        <div class="col-xs-12 col-md-8 items-holder" style="top: 200px; left: 50px;">
                    <div class="container">
                        <hr>
                        <center>
                       <h2>Thank You !!!<br>
                        Your Order No. <?php echo "#". $_SESSION['ordar_no'];?> </h2>
                        </center>
                    </div><!-- /.container -->
            <?php
            if(!empty($_SESSION['ordar_no'])){
                $orderno=$_SESSION['ordar_no'];


                $to = $_SESSION['client_email'];
                $subject = $system_name.': Ordar Confirmation from '.$system_name;
                $header = $system_name.": Ordar Confirmation from".$system_name;
                $message = "Thank You. Your order no is #". $_SESSION['ordar_no'] .".";
                $message .="Your order will soon be shipped.";
                $sentmail = mail($to,$subject,$message,$header);

            unset($_SESSION['ordar_no']);
            }
            ?>
            <br>
            <br>
            <br>


            <a href="index.php" style="float: right;">Shop More</a>

                <!-- ========================================= BREADCRUMB : END ========================================= -->
            </div>
    </div>

</section>
<?php include("include/footer.php");?>
</body>

</html>