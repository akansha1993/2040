<?php
require_once('includes/config.php');
require_once('includes/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ur Buddy - Admin</title>

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
    $GFH_Admin->menu(isset($_GET['q'])?$_GET['q']:'');

}
if(isset($_GET['delete']))
{
    $GFH_Admin->delete_menu($_GET['delete']);
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
                                    <li class=" <?php if(empty($_GET['q'])){ echo 'active';}?>"><a href="#first2">Menu </a></li>
                                    <li class="<?php if(!empty($_GET['q'])){ echo 'active';}?>"><a href="#second2"><?php if(empty($_GET['q'])){ echo'Add Menu';} else{echo'Edit Menu';}?> </a></li>

                                </ul>
                                <header><?php if(empty($_GET['q'])){ echo'Menu';} else{echo'Edit Menu ';}?> </header>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane <?php if(empty($_GET['q'])){ echo 'active';}?>" id="first2">
                                    <div class="table-responsive">
                                        <table id="datatable1" class="table table-striped table-hover">
                                        <thead>

                                            <th>Sort</th>
                                            <th>Menu Title</th>

                                            <th>Image</th>
                                            <th>Action</th>

                                        </thead>
                                        <tbody>
                                        <?php $i=1;
                                        $sql= $GFH_Admin->getMenu();
                                       while( $na=mysqli_fetch_array($sql)){?>
                                        <tr class="gradeX">
                                            <td><?php echo $i;?></td>

                                            <td><?php echo $na['menutitle'];?></td>

                                            
                                            <td><img style="width:50px;" src="../images/icons/<?php echo $na['pic1'];?>"></td>
                                            
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn ink-reaction btn-flat  btn-primary" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-chevron-down"></i> Action </button>
                                                    <ul class="dropdown-menu no-padding" role="menu">
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?q=<?php echo $na['id'];?>" class="btn  ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> Edit
                                                            </a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?delete=<?php echo $na['id'];?>" class="btn  ink-reaction btn-flat btn-danger"><i class="fa fa-remove"> </i> Delete
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
                                            $sl=$GFH_Admin->getMenu($_GET['q']);
                                            $naa=mysqli_fetch_array($sl);
                                        }?>
                                        <div class="row">
                                       <div class="col-md-9">
                                           <div class="form-group">
                                               <input type="text" class="form-control" id="Email1" value="<?php echo isset($naa['menutitle'])?$naa['menutitle']:'';?>" name="name"
                                                      required="" aria-required="true">
                                               <label for="Email1">Menu Title</label>
                                           </div>
                                           </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="file" value="<?php echo isset($naa['pic1'])?"../images/icons/".$naa['pic1']:'';?>" id="img" name="image"
                                                           required="">

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
