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
<?php if(isset($_POST['title']) && !empty($_POST['description'])){
    $GFH_Admin->Pages(isset($_GET['q'])?$_GET['q']:'');
}
if(isset($_GET['delete']))
{
    $GFH_Admin->deletepage($_GET['delete']);
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
                                    <li class=" <?php if(empty($_GET['q'])){ echo 'active';}?>"><a href="#first2">Size Category</a></li>
                                    <li class="<?php if(!empty($_GET['q'])){ echo 'active';}?>"><a href="#second2"><?php if(empty($_GET['q'])){ echo'Add Size Category';} else{echo'Edit Size Category';}?> </a></li>

                                </ul>
                                <header><?php if(empty($_GET['q'])){ echo'Size Category';} else{echo'Edit Size Category';}?> </header>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane <?php if(empty($_GET['q'])){ echo 'active';}?>" id="first2">
                                    <div class="table-responsive">
                                        <table id="datatable1" class="table table-striped table-hover">
                                        <thead>

                                            <th>Sort</th>

                                            <th>Title</th>
                                            <th>Size Category</th>
                                            
                                            <th>Action</th>

                                        </thead>
                                        <tbody>
                                        <?php $i=1;
                                        
                                        $sql=mysqli_query($GFH_Admin::$link,"SELECT * FROM size LEFT JOIN size_category ON size.categoey_id= size_category.id ");

                                       while( $na=mysqli_fetch_array($sql)){?>

                                        <tr class="gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $na['name'];?></td>
                                             <td><?php echo $na['title'];?></td>
                                              <td><?php echo $na['size'];?></td>
                                             
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn ink-reaction btn-flat  btn-primary" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-chevron-down"></i> Action </button>
                                                    <ul class="dropdown-menu no-padding" role="menu">
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?q=<?php echo $na['size_id'];?>" class="btn  ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> Edit
                                                            </a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?delete=<?php echo $na['size_id'];?>" class="btn  ink-reaction btn-flat btn-danger"><i class="fa fa-remove"> </i> Delete
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
                                        <?php if(!empty($_GET['delete'])){
                                          $sql= mysqli_query($GFH_Admin::$link,"DELETE FROM `size` WHERE `size_id`='".$_GET['delete']."'");
                                        }


                                        if(!empty($_GET['q'])){
                                        $sql=mysqli_query($GFH_Admin::$link,"SELECT * FROM `size` WHERE `size_id`='".$_GET['q']."'");
                                        $naa=mysqli_fetch_array($sql);

                                         if(isset($_POST['name'])){
                                         $sql= mysqli_query($GFH_Admin::$link," UPDATE `size` SET `name`='".$_POST['name']."',`categoey_id`='".$_POST['categoey_id']."',`size`='".$_POST['size']."' WHERE `size_id`='".$_GET['q']."'");
                                         if($sql){
                                          echo "<script>alert('successfully Updated');
                                          window.location='manage-sizecategory.php'</script>";
                                         }else{
                                           echo "<script>alert('Error');</script>";
                                         }
                                       }
                                     }
                                      else{
                                      if(isset($_POST['name'])){
                                       // echo "INSERT INTO `size_category` SET `title`='".$_POST['title']."',`status`='".$_POST['status']."'";
                                $sql= mysqli_query($GFH_Admin::$link,"INSERT INTO `size` SET `name`='".$_POST['name']."',`categoey_id`='".$_POST['categoey_id']."',`size`='".$_POST['size']."'") or die('erro');
                                          
                                     }
                                   }

                                        
                                    ?>
                                        <div class="row">
                                       <div class="col-md-7">
                                           <div class="form-group">
                                               <select id="select1" name="name" class="form-control" required="" aria-required="true">
                                                       <option value="S">Small</option>
                                                       <option value="M">Midium</option>
                                                       <option value="L">Large</option>
                                                        <option value="XL">Extra Large</option>
                                                         <option value="XXL">Dual Extra Large</option>
                                                   </select>
                                                   <label for="select1">Status</label>
                                           </div> 
                                           </div>
                                            <div class="col-md-5">
                                            <div class="form-group">
                                            <select id="select1" name="categoey_id" class="form-control" required="" aria-required="true">
                                            <?php $sql1=mysqli_query($GFH_Admin::$link,"SELECT * FROM `size_category` WHERE `status`='1'");
                                            while ($na=mysqli_fetch_array($sql1)) { ?>
                                                       <option value="<?php echo $na['id'];?>"><?php echo $na['title'];?></option>
                                              <?php } ?>
                                                  
                                                   </select>
                                                   <label for="select1">Size Category</label>
                                            </div>
                                            </div>
                                              <div class="col-md-5">
                                               <div class="form-group">
                                                <label for="select1">Size</label>
                                               <input type="text" name="size" class="form-control" value="<?php echo $naa['size']?$naa['size']:'';?>">
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
