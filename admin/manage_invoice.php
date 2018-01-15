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

<?php $GFH_Admin->getsytem();?>
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
                                            href="#first2">All Invoice </a></li>

                                </ul>
                                <header><?php if(empty($_GET['q'])){ echo'All Invoice  ';} else{echo 'All Invoice ';}?> </header>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane <?php if(empty($_GET['q'])){ echo 'active';}?>" id="first2">
                                    <div class="table-responsive">
                                        <table id="datatable1" class="table table-striped table-hover">
                                            <thead>

                                            <th>Sort</th>
                                            <th>Invoice #</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Telephone</th>

                                            <th>Amount</th>
                                            <th>Order Date</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                            </thead>
                                            <tbody>
                                            <?php $i=1;
                                            $sql= $GFH_Admin->getinvoice(isset($_GET['st'])?$_GET['st']:'');
                                            while($na=mysqli_fetch_array($sql)){
                                                $sl=$GFH_Admin->getclient($na['user_id']);
                                                $gh=mysqli_fetch_array($sl);
                                                ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td>fab-<?php echo $na['invoice_id'];?></td>
                                                    <td><?php echo $gh['fullname'];?></td>
                                                    <td><?php echo $gh['email'];?></td>
                                                    <td><?php echo $gh['phone'];?></td>
                                                    <td><?php $totalamount= $na['amount']; echo $totalamount?></td>

                                                    <td><?php echo $na['date'];?></td>
                                                    <td><?php if($na['status']=='1'){ echo "Unpaid";} else { echo "Paid"; };?></td>
                                                    <td>
                                                        <a href="<?php $_SERVER['PHP_SELF'];?>?q=<?php echo $na['order_no'];?>" class="btn  ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> View
                                                        </a>

                                                    </td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                               <div class="tab-pane <?php if(!empty($_GET['q'])){ echo 'active';}?>" id="second2">
                                   <div class="card-printable style-default-bright">


                                       <div class="card-body style-default-bright">

                                           <!-- BEGIN INVOICE HEADER -->
                                           <div class="row">
                                               <div class="col-xs-8">
                                                  <img class="img-responsive width-8" src="../images/system/<?php echo $system_logo ?>">
                                               </div>
                                               <div class="col-xs-4 text-right">
                                                   <h1 class="text-light text-default-light">Invoice</h1>
                                               </div>
                                           </div><!--end .row -->
                                           <!-- END INVOICE HEADER -->

                                           <br/>
                    <?php $slk=$GFH_Admin->get_order($_GET['q']);
                            $kk=mysqli_fetch_array($slk);?>
                                           <!-- BEGIN INVOICE DESCRIPTION -->
                                           <div class="row">
                                               <div class="col-xs-4">
                                                   <h4 class="text-light">Prepared by</h4>
                                                   <address>
                                                       <strong><?php echo $system_name?> </strong><br>
                                                      <?php echo $system_address; ?><br>
                                                       <abbr title="Phone">P: <?php echo $system_phone; ?></abbr>
                                                   </address>
                                               </div><!--end .col -->
                                               <div class="col-xs-4">
                                                   <h4 class="text-light">Prepared for</h4>
                                                   <address>
                                                       <strong><?php $use= $GFH_Admin->getclient($kk['user_id']);
                                                       $us=mysqli_fetch_array($use);
                                                       echo $us['fullname'];?></strong><br>
                                                      <?php echo $us['shipping_add'];?><br>
                                                       <?php echo $us['shipping_add1'];?><br>
                                                       <abbr title="Phone">P:</abbr> <?php echo $us['phone'];?>
                                                   </address>
                                               </div><!--end .col -->
                                               <div class="col-xs-4">
                                                   <div class="well">
                                                       <div class="clearfix">
                                                           <div class="pull-left"> INVOICE NO : </div>
                                                           <div class="pull-right"> #FAB<?php echo $_GET['q'];?> </div>
                                                       </div>
                                                       <div class="clearfix">
                                                           <div class="pull-left"> INVOICE DATE : </div>
                                                           <div class="pull-right"> <?php echo date("d-m-Y", strtotime($kk['date']));?> </div>
                                                       </div>
                                                   </div>
                                               </div><!--end .col -->
                                           </div><!--end .row -->
                                           <!-- END INVOICE DESCRIPTION -->



                                    <table class="table">
                                        <thead>
                                        <th>Sr</th>
                                        <th>HSN Code</th>
                                        <th>Product</th>

                                        <th>Quantity</th>
                                        <th>GST</th>
                                        <th>Price</th>


                                        </thead>
                                        <tbody>
                                        <?php $i=1;
                                        $sql= $GFH_Admin->getshooping_cart($_GET['q']);
                                        while($na=mysqli_fetch_array($sql)){

                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $na['hsn'];?></td>
                                                <td><?php $s=$GFH_Admin->getproduct($na['product_id']);
                                                $jk=mysqli_fetch_array($s); echo $jk['prod_name'];?></td>
                                                <td><?php echo $na['quantity'];?></td>
                                                <td><?php echo $na['gst']."%";?></td>
                                                <td><?php echo "Rs. ".$na['price'];?></td>


                                            </tr>
                                            <?php $i++; } ?>
                                        <tr >
                                            <td colspan="4"></td>
                                            <td><h4>Total Amount: </h4></td>
                                            <td><h4><?php echo "Rs. ". $totalamount;?> </h4></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                   </div><!--end .col -->
                               </div><!--end .row -->
                                <!-- END INVOICE PRODUCTS -->
                                <a class="btn btn-floating-action pull-right btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></a>

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
