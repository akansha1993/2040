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

    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">

                    <!-- BEGIN ALERT - REVENUE -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-info no-margin">
                                    <strong class="pull-right text-success text-lg">0,38% <i class="md md-trending-up"></i></strong>
                                    <strong class="text-xl">$ 32,829</strong><br/>
                                    <span class="opacity-50">Revenue</span>
                                    <div class="stick-bottom-left-right">
                                        <div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END ALERT - REVENUE -->

                    <!-- BEGIN ALERT - VISITS -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-warning no-margin">
                                    <strong class="pull-right text-warning text-lg">0,01% <i class="md md-swap-vert"></i></strong>
                                    <strong class="text-xl">432,901</strong><br/>
                                    <span class="opacity-50">Visitser</span>
                                    <div class="stick-bottom-right">
                                        <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END ALERT - VISITS -->

                    <!-- BEGIN ALERT - BOUNCE RATES -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-danger no-margin">
                                    <strong class="pull-right text-danger text-lg">0,18% <i class="md md-trending-down"></i></strong>
                                    <strong class="text-xl">42.90%</strong><br/>
                                    <span class="opacity-50">Ordar rate</span>
                                    <div class="stick-bottom-left-right">
                                        <div class="progress progress-hairline no-margin">
                                            <div class="progress-bar progress-bar-danger" style="width:43%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END ALERT - BOUNCE RATES -->

                    <!-- BEGIN ALERT - TIME ON SITE -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-success no-margin">
                                    <h1 class="pull-right text-success"><i class="md md-timer"></i></h1>
                                    <strong class="text-xl">54 sec.</strong><br/>
                                    <span class="opacity-50">Avg. time on site</span>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END ALERT - TIME ON SITE -->

                </div><!--end .row -->
                <div class="row">

                    <!-- BEGIN SITE ACTIVITY -->
                    <div class="col-md-9">
                        <div class="card ">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-head">
                                        <header>Ordar Analytics</header>
                                    </div><!--end .card-head -->
                                    <div class="card-body height-8">
                                        <div id="flot-visitors-legend" class="flot-legend-horizontal stick-top-right no-y-padding"></div>
                                        <div id="flot-visitors" class="flot height-7" data-title="Activity entry" data-color="#7dd8d2,#0aa89e"></div>
                                    </div><!--end .card-body -->
                                </div><!--end .col -->
                                <div class="col-md-4">
                                    <div class="card-head">
                                        <header>Total Ordar</header>
                                    </div>
                                    <div class="card-body height-8">
                                        <strong>214</strong> members
                                        <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                        <div class="progress progress-hairline">
                                            <div class="progress-bar progress-bar-primary-dark" style="width:43%"></div>
                                        </div>
                                        756 pageviews
                                        <span class="pull-right text-success text-sm">0,68% <i class="md md-trending-up"></i></span>
                                        <div class="progress progress-hairline">
                                            <div class="progress-bar progress-bar-primary-dark" style="width:11%"></div>
                                        </div>
                                        291 bounce rates
                                        <span class="pull-right text-danger text-sm">21,08% <i class="md md-trending-down"></i></span>
                                        <div class="progress progress-hairline">
                                            <div class="progress-bar progress-bar-danger" style="width:93%"></div>
                                        </div>
                                        32,301 visits
                                        <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                        <div class="progress progress-hairline">
                                            <div class="progress-bar progress-bar-primary-dark" style="width:63%"></div>
                                        </div>
                                        132 pages
                                        <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                        <div class="progress progress-hairline">
                                            <div class="progress-bar progress-bar-primary-dark" style="width:47%"></div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .col -->
                            </div><!--end .row -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END SITE ACTIVITY -->

                    <!-- BEGIN SERVER STATUS -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-head">
                                <header class="text-primary">Site status</header>
                            </div><!--end .card-head -->
                            <div class="card-body height-4">
                                <div class="pull-right text-center">
                                    <em class="text-primary">Temperature</em>
                                    <br/>
                                    <div id="serverStatusKnob" class="knob knob-shadow knob-primary knob-body-track size-2">
                                        <input type="text" class="dial" data-min="0" data-max="100" data-thickness=".09" value="50" data-readOnly=true>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                            <div class="card-body height-4 no-padding">
                                <div class="stick-bottom-left-right">
                                    <div id="rickshawGraph" class="height-4" data-color1="#0aa89e" data-color2="rgba(79, 89, 89, 0.2)"></div>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END SERVER STATUS -->

                </div><!--end .row -->

                <div class="row">

                    <!-- BEGIN SITE ACTIVITY -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-head">
                                       <header>New Ordar's</header>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="datatable1" class="table table-striped table-hover">
                                                <thead>

                                                <th>Sort</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Telephone</th>
                                                <th>Location</th>
                                                <th>Amount</th>
                                                <th>Pay Method</th>
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
                                                        <td><?php echo $na['amount'];?></td>
                                                        <td><?php if($na['payment_method']=='no'){ echo "Online";}else{echo "Offline";};?></td>

                                                        <td>
                                                            <a href="<?php $_SERVER['PHP_SELF'];?>?q=<?php echo $na['order_id'];?>" class="btn  ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> View
                                                            </a>

                                                        </td>
                                                    </tr>
                                                    <?php $i++; } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
