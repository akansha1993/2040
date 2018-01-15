<?php
require_once('includes/config.php');
require_once('includes/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $sys['system_name'];?> Admin</title><!-- BEGIN META -->
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

    <input type="hidden" id="autocomplete1" class="form-control" data-source="../../html/forms/data/countries.json.html" placeholder="Countries">
    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div>
    <!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->
<?php if(isset($_GET['q'])&& !empty($_GET['q'])){
    $id=$_GET['q'];
   $sql=mysqli_query($GFH_Admin::$link,"UPDATE `review` SET `status`='1' WHERE `review_id`='$id'");
   if($sql){ echo "<script>window.location='manage-review.php?msg=Enabled Successfully'</script>"; }
}
if(isset($_GET['delete']))
{
    $GFH_Admin->deletecoupan($_GET['delete']);
}?>
    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-underline">
                            <div class="card-head">
                                <ul class="nav nav-tabs pull-right" data-toggle="tabs">
                                    <li class=" <?php if(empty($_GET['q'])){ echo 'active';}?>"><a href="#first2">Review </a></li>

                                </ul>
                                <header>Review</header>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane <?php if(empty($_GET['q'])){ echo 'active';}?>" id="first2">
                                    <div class="table-responsive">
                                        <table id="datatable1" class="table table-striped table-hover">
                                        <thead>

                                            <th>Sort</th>

                                            <th>Product</th>
                                            <th>Review</th>
                                            <th>Client Name</th>
                                            <th>Email</th>
                                            <th>Status</th>

                                            <th>Created On</th>
                                            <th>Action</th>

                                        </thead>
                                        <tbody>
                                        <?php $i=1;
                                        $sql= $GFH_Admin->get_review();
                                       while( $na=mysqli_fetch_array($sql)){?>
                                        <tr class="gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><?php $sk=$GFH_Admin->getproduct($na['product_id']);$kk=mysqli_fetch_array($sk);
                                                echo $kk['prod_name'];?></td>
                                            <td><?php echo $na['user_name'];?> </td>
                                            <td><?php echo $na['email'];?></td>
                                            <td><?php echo $na['coupan_code'];?></td>
                                            <td><?php if($na['status']=='1'){echo 'Active';}else{
                                            echo "Inactive";
                                                }?></td>
                                            <td><?php echo date("d-m-Y",$na['created_on']);?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn ink-reaction btn-flat  btn-primary" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-chevron-down"></i> Action </button>
                                                    <ul class="dropdown-menu no-padding" role="menu">
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?q=<?php echo $na['coupan_id'];?>" class="btn  ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> Enable
                                                            </a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?delete=<?php echo $na['coupan_id'];?>" class="btn  ink-reaction btn-flat btn-danger"><i class="fa fa-remove"> </i> Delete
                                                            </a></li>

                                                    </ul>
                                                </div>

                                            </td>
                                        </tr>
                                        <?php $i++; }?>
</tbody>
                                    </table>
                                        </div>
                                </div>


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
