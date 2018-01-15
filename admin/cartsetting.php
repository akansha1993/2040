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

    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-underline">
                            <div class="card-head">
                                <ul class="nav nav-tabs pull-right" data-toggle="tabs">
                                    <li class=" <?php if(empty($_GET['q'])){ echo 'active';}?>"><a href="#first2">Payment Mode</a></li>
                                    <li class="<?php if(!empty($_GET['q'])){ echo 'active';}?>"><a href="#second2"><?php if(empty($_GET['q'])){ echo'Add Payment Mode';} else{echo'Edit Payment Mode';}?> </a></li>
                               </ul>
                                <header><?php if(empty($_GET['q'])){ echo'Cart Setting';} else{echo'Edit Cart Setting';}?> </header>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane <?php if(empty($_GET['q'])){ echo 'active';}?>" id="first2">
                                    <div class="table-responsive">
                                        <?php if(isset($_POST['name'])){
                                            $GFH_Admin->cartsetting(isset($_GET['q'])?$_GET['q']:'');
                                        }
                                        if(isset($_GET['delete']))
                                        {
                                            $GFH_Admin->deletecart_setting($_GET['delete']);
                                        }?>
                                        <table id="datatable1" class="table table-striped table-hover">
                                        <thead>

                                            <th>Sort</th>

                                            <th>Title</th>
                                            <th>Mode</th>

                                            <th>Status</th>
                                            <th>Action</th>

                                        </thead>
                                        <tbody>
                                        <?php $i=1;
                                        $sql1= $GFH_Admin->get_cartsetting();
                                       while( $na=mysqli_fetch_array($sql1)){?>
                                        <tr class="gradeX">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $na['name'];?></td>
                                            <td><?php if($na['mode']=='on'){echo "Online Payment";  } else{echo "Offline Payment";};?></td>
                                            <td><?php if($na['status']=='1'){echo 'Active';}else{
                                            echo "Inactive";
                                                }?></td>

                                            <td><?php echo date("d-m-Y",$na['created_on']);?></td>
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
                                    <form method="post" class="form form-validate" enctype="multipart/form-data">
                                        <?php if(isset($_GET['q'])){
                                            $sl=$GFH_Admin->get_cartsetting($_GET['q']);
                                            $naa=mysqli_fetch_array($sl);
                                        }?>
                                        <div class="row">
                                       <div class="col-md-10">
                                           <div class="form-group">
                                               <input type="text" class="form-control" id="prod_name" value="<?php echo isset($naa['name'])?$naa['name']:'';?>" name="name"
                                                      required="" aria-required="true">
                                               <label for="Email1">Title </label>
                                           </div>
                                       </div>

                                            <div class="col-md-2">
                                                <label for="select1">Status</label>
                                                <div>
                                                    <label class="radio-inline radio-styled">
                                                        <input type="radio" name="status" value="1" checked><span>Active</span>
                                                    </label>
                                                    <label class="radio-inline radio-styled">
                                                        <input type="radio" name="status" value="0"><span>Deactive</span>
                                                    </label>
                                                </div>


                                                </div>


                                            <div class="col-md-3">
                                               <div class="form-group floating-label">
                                                   <select id="mode" name="mode" class="form-control" required="" aria-required="true">
                                                       <option value="on">Online Payment</option>
                                                       <option value="off">Offline Payment</option>

                                                   </select>
                                                   <label for="select1">Mode</label>
                                               </div>
                                           </div>



                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>Note</h4>
                                                    	<textarea name="note" class="form-control control-12-rows summernote"
                                                                  placeholder="Enter text ..."><?php echo isset($naa['note'])?$naa['note']:''?></textarea>

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

<script>
    function subcat(id){
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: "category_id="+id,
            success: function (data) {
        document.getElementById('subcategory_id').innerHTML=data;

            }
        })
}
</script>
</body>
</html>
