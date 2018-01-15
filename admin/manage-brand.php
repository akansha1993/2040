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
<?php if(isset($_POST['name'])){
    $GFH_Admin->brand(isset($_GET['q'])?$_GET['q']:'');
}
if(isset($_GET['delete']))
{
    $GFH_Admin->deletebrand($_GET['delete']);
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
                                    <li class=" <?php if(empty($_GET['q'])){ echo 'active';}?>"><a href="#first2">Brand</a></li>
                                    <li class="<?php if(!empty($_GET['q'])){ echo 'active';}?>"><a href="#second2"><?php if(empty($_GET['q'])){ echo'Add Brand';} else{echo'Edit Brand';}?> </a></li>

                                </ul>
                                <header><?php if(empty($_GET['q'])){ echo'Brand';} else{echo'Edit Brand';}?> </header>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane <?php if(empty($_GET['q'])){ echo 'active';}?>" id="first2">
                                    <div class="table-responsive">
                                        <table id="datatable1" class="table table-striped table-hover">
                                        <thead>

                                            <th>Sort</th>

                                            <th>Brand Title</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Created On</th>
                                            <th>Action</th>

                                        </thead>
                                        <tbody>
                                        <?php $i=1;
                                        $sql= $GFH_Admin->getbrand();
                                       while( $na=mysqli_fetch_array($sql)){?>
                                        <tr class="gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $na['brand_name'];?></td>
                                            <td><?php if($na['status']=='1'){echo 'Active';}else{
                                            echo "Inactive";
                                                }?></td>
                                            
                                            <td><img style="width:50px;" src="../images/brand/<?php echo $na['image'];?>"></td>
                                            <td><?php echo date("d-m-Y",$na['image']);?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn ink-reaction btn-flat  btn-primary" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-chevron-down"></i> Action </button>
                                                    <ul class="dropdown-menu no-padding" role="menu">
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?q=<?php echo $na['brand_id'];?>" class="btn  ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> Edit
                                                            </a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?delete=<?php echo $na['brand_id'];?>" class="btn  ink-reaction btn-flat btn-danger"><i class="fa fa-remove"> </i> Delete
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
                                            $sl=$GFH_Admin->getbrand($_GET['q']);
                                            $naa=mysqli_fetch_array($sl);
                                        }?>
                                        <div class="row">
                                       <div class="col-md-7">
                                           <div class="form-group">
                                               <input type="text" class="form-control" id="Email1" value="<?php echo isset($naa['brand_name'])?$naa['brand_name']:'';?>" name="name"
                                                      required="" aria-required="true">
                                               <label for="Email1">Brand Title</label>
                                           </div>
                                           <div class="row">
                                           <div class="col-md-6">
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
                                               <div class="col-md-5">
                                                   <div class="form-group">
                                                       <input type="file" name="image" style="width: 0.1px; height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected"  />
                                                       <label style="
    color: #f1e5e6;
    background-color: #d3394c;" for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Choose a file…</span></label>
                                                   </div>
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
