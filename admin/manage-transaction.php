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
                                <header>Bank Transaction</header>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane <?php if(empty($_GET['q'])){ echo 'active';}?>" id="first2">
                                    <div class="table-responsive">
                                        <table id="datatable1" class="table table-striped table-hover">
                                            <thead>

                                            <th>Sort</th>
                                            <th>First Name</th>
                                            <th>Email</th>
                                            <th>Amount</th>
                                            <th>Ordar No.</th>
                                            <th>Status</th>
                                            <th>Transcation Id</th>
                                            <th>Date</th>

                                            </thead>
                                            <tbody>
                                            <?php $i=1;
                                            $sql= $GFH_Admin->get_transaction();
                                            while($na=mysqli_fetch_array($sql)){

                                                ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><?php echo $gh['firstname'];?></td>
                                                    <td><?php echo $gh['email'];?></td>
                                                    <td><?php echo $gh['amount'];?></td>
                                                    <td><?php echo $gh['order_no'];  ?></td>
                                                    <td><?php echo $gh['status'];  ?></td>
                                                    <td><?php echo $gh['transaction_no'];  ?></td>
                                                    <td><?php echo $na['date'];?></td>

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
