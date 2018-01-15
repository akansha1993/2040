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
<?php if(isset($_POST['name'])){
    $GFH_Admin->coupan(isset($_GET['q'])?$_GET['q']:'');
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
                                    <li class=" <?php if(empty($_GET['q'])){ echo 'active';}?>"><a href="#first2">Coupan </a></li>
                                    <li class="<?php if(!empty($_GET['q'])){ echo 'active';}?>"><a href="#second2"><?php if(empty($_GET['q'])){ echo'Add Coupan';} else{echo'Edit Coupan';}?> </a></li>

                                </ul>
                                <header><?php if(empty($_GET['q'])){ echo' Coupans ';} else{echo'Edit Coupan';}?> </header>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane <?php if(empty($_GET['q'])){ echo 'active';}?>" id="first2">
                                    <div class="table-responsive">
                                        <table id="datatable1" class="table table-striped table-hover">
                                        <thead>

                                            <th>Sort</th>

                                            <th>Coupan Title</th>
                                            <th>Amount</th>
                                            <th>Expiry</th>
                                            <th>Coupan Code</th>
                                            <th>Status</th>

                                            <th>Created On</th>
                                            <th>Action</th>

                                        </thead>
                                        <tbody>
                                        <?php $i=1;
                                        $sql= $GFH_Admin->getcoupan();
                                       while( $na=mysqli_fetch_array($sql)){?>
                                        <tr class="gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $na['coupan_title'];?></td>
                                            <td><?php echo $na['amount'];?></td>
                                            <td><?php echo $na['expiry'];?></td>
                                            <td><?php echo $na['coupan_code'];?></td>
                                            <td><?php if($na['status']=='1'){echo 'Active';}else{
                                            echo "Inactive";
                                                }?></td>
                                            

                                            <td><?php echo date("d-m-Y", strtotime($na['created_on']));?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn ink-reaction btn-flat  btn-primary" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-chevron-down"></i> Action </button>
                                                    <ul class="dropdown-menu no-padding" role="menu">
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?q=<?php echo $na['coupan_id'];?>" class="btn  ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> Edit
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
                                <div class="tab-pane <?php if(!empty($_GET['q'])){ echo 'active';}?>" id="second2">
                                    <form method="post" class="form form-validate floating-label" enctype="multipart/form-data">
                                        <?php if(isset($_GET['q'])){
                                            $sl=$GFH_Admin->getcoupan($_GET['q']);
                                            $naa=mysqli_fetch_array($sl);
                                        }?>
                                        <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <input type="text" class="form-control" id="Email1" value="<?php echo isset($naa['coupan_title'])?$naa['coupan_title']:'';?>" name="name"
                                                      required="" aria-required="true">
                                               <label for="Email1">Coupan Title</label>
                                           </div>
                                       </div>
                                            <div class="col-md-3">
                                                <div class="form-group control-width-normal">
                                                    <div class="input-group date" id="demo-date">
                                                        <div class="input-group-content">
                                                            <input type="text" name="expiry"  value="<?php echo isset($naa['expiry'])?$naa['expiry']:'';?>" class="form-control">
                                                            <label>Expiry</label>
                                                        </div>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div><!--end .form-group -->
                                            </div>

                                           <div class="col-md-3">
                                               <div class="form-group">
                                                   <select id="select1" name="status" class="form-control" required=""
                                                           aria-required="true">
                                                       <option value=""></option>
                                                       <option value="1">Active</option>
                                                       <option value="0">Deactive</option>

                                                   </select>
                                                   <label for="select1">Status</label>
                                               </div>
                                           </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <input type="text" value="<?php echo isset($naa['amount'])?$naa['amount']:'';?>" class="form-control" name="amount" id="" >
                                                       <label for="select1">Amount</label>
                                                   </div>

                                           </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo isset($naa['applicable_amount'])?$naa['applicable_amount']:'';?>" class="form-control" name="applicable_amount">
                                                    <label for="select1">Applicable amount</label>
                                                </div>

                                            </div><div class="col-md-6">
                                               <div class="form-group">
                                                   <input type="text" value="<?php echo isset($naa['tags'])?$naa['tags']:'';?>"  name="tag[]" data-role="tagsinput" />
                                                   <label>Tags</label>
                                               </div><!--end .form-group -->

                                           </div>
                                        </div>



                                        <div class="card-actionbar">
                                            <div class="card-actionbar-row">
                                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">
                                                   Save Changes
                                                </button>
                                            </div>
                                        </div>


                                    </form>
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
