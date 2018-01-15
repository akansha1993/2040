<?php
require_once('includes/config.php');
require_once('includes/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $sys['system_name'];?> Admin</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->
    <?php require_once('includes/css.inc'); ?>

    <script type="text/javascript" src="assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed ">

<!-- BEGIN HEADER-->
<?php require_once('includes/header.inc'); ?>

<!-- BEGIN BASE-->
<div id="base">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div>
    <!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->


<?php $GFH_Admin->getsytem();
if(isset($_GET['invoice'])&& !empty($_GET['invoice']))
{
$GFH_Admin->genrate_invoice($_GET['invoice']);
}
if(isset($_GET['orderid'])) {
    $orderid = base64_decode($_GET['orderid']);
    $status = $_GET['status'];
    $phone=base64_decode($_GET['phone']);
    if ($status != 'delivered') {
        $sql = mysqli_query($GFH_Admin::$link, "UPDATE `product_order` SET `delivery_status`='$status' WHERE `order_id`='$orderid'");
        $text="Dear Customer your Order number $orderid has been $status";
        $url="user=fabiano&pwd=Fabiano4141&route=Transactional&sender=Fabino&mobileno=".$phone."&text=".$text;
        $ch=curl_init("http://www.smsnmedia.com/api/push?");
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $result=curl_exec($ch);
        curl_close($ch);
        echo "<script> window.location='manage-ordar.php';</script>";
    }else{
        $sql = mysqli_query($GFH_Admin::$link, "UPDATE `product_order` SET `payment_status`='Paid',`delivery_status`='$status' WHERE `order_id`='$orderid'");
        $text="Dear Customer your Order number $orderid has been $status";
        $url="user=fabiano&pwd=Fabiano4141&route=Transactional&sender=Fabino&mobileno=".$phone."&text=".$text;
        $ch=curl_init("http://www.smsnmedia.com/api/push?");
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $result=curl_exec($ch);
        curl_close($ch);
        echo "<script> window.location='manage-ordar.php';</script>";
    }


}


?>
    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-underline">
                            <div class="card-head">
                                <ul class="nav nav-tabs pull-right" data-toggle="tabs">
                                    <li class=" <?php if(empty($_GET['q'])){ echo 'active';}?>"><a
                                            href="#first2">All Ordar </a></li>

                                </ul>
                                <header><?php if(empty($_GET['q'])){ echo'Invoices ';} else{echo'Invoice Details ';}?> </header>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane <?php if(empty($_GET['q'])){ echo 'active';}?>" id="first2">
                                    <div class="table-responsive">
                                        <table id="example" class="table order-column hover">
                                            <thead>

                                            <th>Sort</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Location</th>
                                            <th>Amount</th>
                                            <th>Pay Method</th>
                                            <th>Payment Status</th>
                                            <th>Delivery Status</th>
                                            <th>Order Date</th>
                                            <th>Action</th>

                                            </thead>
                                            <tbody>
                                            <?php $i=1;
                                            $sql= $GFH_Admin->getnewordar();
                                            while($na=mysqli_fetch_array($sql)){
                                                $sl=$GFH_Admin->getclient($na['user_id']);
                                                $gh=mysqli_fetch_array($sl);
                                                ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><?php echo $gh['fullname'];?></td>
                                                    <td><?php echo $gh['email'];?></td>
                                                    <td><?php echo $gh['phone'];?></td>
                                                    <td><?php echo $gh['shipping_add'];  ?></td>
                                                    <td><?php $totalamount= $na['amount']; echo $totalamount?></td>
                                                    <td><?php if($na['payment_method']=='no'){ echo "Online";}else{echo "Offline";};?></td>
                                                    <td><?php echo $na['payment_status'];  ?></td>
                                                    <td><?php echo $na['delivery_status'];  ?></td>
                                                    <td><?php echo $na['date'];?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn ink-reaction btn-flat  btn-primary" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-chevron-down"></i> Action </button>
                                                            <ul class="dropdown-menu no-padding" role="menu">

                                                                <li>
                                                                    <a href="?invoice=<?php echo $na['order_id'];?>" class="text-left ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> Genrate Invoice</a>
                                                                    <a href="?orderid=<?php echo base64_encode($na['order_id']);?>&status=dispatched&phone=<?php echo base64_encode($gh['phone']);?>" class="text-left ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> Dispatched</a>
                                                                    <a href="?orderid=<?php echo base64_encode($na['order_id']);?>&status=delivered&phone=<?php echo base64_encode($gh['phone']);?>" class="text-left ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> Deliverd</a>
                                                                </li>

                                                    </td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>
                                        </div>
                                </div>


                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                </div><!--end .row -->

            </div>
                        </div>
                    </div>

                </div>
                <!--end .row -->
            </div>
            <!--end .section-body -->
        </section>
    </div>
    <!--end #content-->
    <!-- END CONTENT -->

    <?php require_once('includes/menu.inc'); ?>


</div>
<!--end #base-->
<!-- END BASE -->

<?php require_once('includes/js.inc'); ?>
</body>
</html>
