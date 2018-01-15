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
    <input type="hidden" id="autocomplete1" class="form-control" data-source="../../html/forms/data/countries.json.html" placeholder="Countries">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div>
    <!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->
<?php if(isset($_POST['discount_title'])){
    $GFH_Admin->discount(isset($_GET['q'])?$_GET['q']:'');
}
if(isset($_GET['delete']))
{
    $GFH_Admin->deletediscount($_GET['delete']);
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
                                    <li class=" <?php if(empty($_GET['q'])){ echo 'active';}?>"><a href="#first2">Discount</a></li>
                                    <li class="<?php if(!empty($_GET['q'])){ echo 'active';}?>"><a href="#second2"><?php if(empty($_GET['q'])){ echo'Add Discount';} else{echo'Edit Discount';}?> </a></li>

                                </ul>
                                <header><?php if(empty($_GET['q'])){ echo'Add Discount';} else{echo'Edit Discount';}?> </header>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane <?php if(empty($_GET['q'])){ echo 'active';}?>" id="first2">
                                    <div class="table-responsive">
                                        <table id="datatable1" class="table table-striped table-hover">
                                        <thead>

                                            <th>Sort</th>

                                            <th>Discount Title</th>
                                            <th>Value</th>
                                            <th>Expiry</th>
                                            <th>Status</th>

                                            <th>Created On</th>
                                            <th>Action</th>

                                        </thead>
                                        <tbody>
                                        <?php $i=1;
                                        $sql= $GFH_Admin->getdiscount();
                                       while( $na=mysqli_fetch_array($sql)){?>
                                        <tr class="gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $na['discount_title'];?></td>
                                            <td><?php echo $na['discount_value'];?></td>
                                            <td><?php echo $na['expiry'];?></td>
                                            <td><?php if($na['status']=='1'){echo 'Active';}else{
                                            echo "Inactive";
                                                }?></td>

                                            <td><?php echo date("d-m-Y",$na['Expiry']);?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn ink-reaction btn-flat  btn-primary" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-chevron-down"></i> Action </button>
                                                    <ul class="dropdown-menu no-padding" role="menu">
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?q=<?php echo $na['discount_id'];?>" class="btn  ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> Edit
                                                            </a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?delete=<?php echo $na['discount_id'];?>" class="btn  ink-reaction btn-flat btn-danger"><i class="fa fa-remove"> </i> Delete
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
                                            $sl=$GFH_Admin->getdiscount($_GET['q']);
                                            $naa=mysqli_fetch_array($sl);
                                        }?>
                                        <div class="row">
                                       <div class="col-md-7">
                                           <div class="form-group">
                                               <input type="text" class="form-control" id="Email1" value="<?php echo isset($naa['discount_title'])?$naa['discount_title']:'';?>" name="discount_title"
                                                      required="" aria-required="true">
                                               <label for="Email1">Discount Title </label>
                                           </div>
                                       </div>
                                            <div class="col-md-5">
                                           <div class="form-group">
                                               <input type="text" class="form-control" id="Email1" value="<?php echo isset($naa['discount_value'])?$naa['discount_value']:'';?>" name="discount_value"
                                                      required="" aria-required="true">
                                               <label for="Email1">Discount Value </label>
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
                                           </div><div class="col-md-3">
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

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    	<textarea id="summernote" name="discount_note" class="form-control control-12-rows"
                                                                  placeholder="Enter text ..."><?php echo isset($naa['discount_note'])?$naa['discount_note']:''?></textarea>

                                                </div>
                                            </div>

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
