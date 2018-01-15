<?php
require_once('includes/config.php');
require_once('includes/function.php');
error_reporting(0);
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
    <input type="hidden" id="autocomplete1" class="form-control"
           data-source="../../html/forms/data/countries.json.html"
           placeholder="Countries">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div>
    <!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->
<?php if(isset($_POST['menutitle'])){
    $GFH_Admin->content(isset($_GET['q'])?$_GET['q']:'');

}
if(isset($_GET['delete']))
{
    $GFH_Admin->deleteContent($_GET['delete']);
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
                                    <li class=" <?php if(empty($_GET['q'])){ echo 'active';}?>"><a
                                            href="#first2">Pages </a></li>
                                    <li class="<?php if(!empty($_GET['q'])){ echo 'active';}?>"><a
                                            href="#second2"><?php if(empty($_GET['q'])){ echo'Add Page';}
                                            else{echo'Edit Page';}?> </a></li>

                                </ul>
                                <header><?php if(empty($_GET['q'])){ echo'Page';} else{echo'Edit Page';}?> </header>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane <?php if(empty($_GET['q'])){ echo 'active';}?>" id="first2">
                                    <div class="table-responsive">
                                        <table id="datatable1" class="table table-striped table-hover">
                                        <thead>

                                            <th>Sort</th>
                                            <th> Title</th>

                                            <td>Description</td>
                                            <th>Action</th>

                                        </thead>
                                        <tbody>
                                        <?php $i=1;
                                        $sql= $GFH_Admin->getcontent();
                                       while( $na=mysqli_fetch_array($sql)){?>
                                        <tr class="gradeX">
                                            <td><?php echo $i;?></td>

                                            <td><?php
                                            echo $na['menutitle'];?></td>
                                            <td><?php
                                                echo $na['page_description'];?></td>


                                            <td>
                                                <a href="<?php $_SERVER['PHP_SELF'];?>?q=<?php echo $na['id'];?>" class="btn  ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> Edit
                                                </a> <a href="<?php $_SERVER['PHP_SELF'];?>?delete=<?php echo $na['id'];?>" class="btn  ink-reaction btn-flat btn-danger"><i class="fa fa-remove"> </i> Delete
                                                            </a>
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
                                            $sl=$GFH_Admin->getcontent($_GET['q']);
                                            $naa=mysqli_fetch_array($sl);

                                        }?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <input type="text" value="<?php echo isset($naa['menutitle'])?$naa['menutitle']:'';?>" class="form-control select2-list" name="menutitle" />
                                            <label for="menu">Page Title</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    	<textarea id="summernote" name="page_description" class="form-control control-12-rows"
                                                                  placeholder="Enter text ..."><?php echo isset($naa['page_description'])?$naa['page_description']:''?></textarea>

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
