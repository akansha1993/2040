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
                                    <li class="active"><a href="#first2">Inventory</a></li>
                                  </ul>
                                <header>Purchase Inventory </header>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane active" id="first2">
                                    <div class="row">
                                        <div class="col-md-8 pull-right">
                                            <h3>Select Date Range</h3>
                                            <form class="form" method="get">
                                                <div class="form-group">
                                                    <div class="input-daterange input-group" id="demo-date-range">
                                                        <div class="input-group-content">
                                                            <input type="text" class="form-control" name="start" value="<?php echo isset($_GET['start'])?$_GET['start']:''; ?>" />
                                                            <label>Date range</label>
                                                        </div>
                                                        <span class="input-group-addon">to</span>
                                                        <div class="input-group-content">
                                                            <input type="text" class="form-control" name="end" value="<?php echo  isset($_GET['end'])?$_GET['end']:''; ?>"/>
                                                            <div class="form-control-line"></div>
                                                        </div>
                                                        <button class="btn btn-accent" type="submit">GET</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="table-responsive">

                                        <table id="example" class="table order-column hover">
                                        <thead>
                                        <th>Sort</th>

                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Purchase Rate</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Profit</th>
                                        <th>Image</th>
                                        <th>Created On</th>


                                        </thead>
                                        <tbody>
                                        <?php $i=1;
                                        $sql1= $GFH_Admin->getpurchaseinventory(isset($_GET['start'])?date("Y-m-d",strtotime($_GET['start'])):'',isset($_GET['end'])?date("Y-m-d",strtotime($_GET['end'])):'');
                                       while( $na=mysqli_fetch_array($sql1)){?>
                                           <tr class="gradeX ">
                                               <td><?php echo $i;?></td>
                                               <td><?php $sy=$GFH_Admin->getproduct($na['product_id']);$ga=mysqli_fetch_array($sy);
                                                   echo $ga['prod_name'];?></td>
                                               <td><?php echo $na['quantity'];?></td>
                                               <td><?php echo $ga['prate'];?></td>
                                               <td><?php echo $na['amount'];?></td>
                                               <td><?php $sql=$GFH_Admin->getCategory($ga['category_id']); $nai=mysqli_fetch_array($sql); echo $nai['category_name'];?></td>
                                               <td><?php $sql=$GFH_Admin->getsubCategory($ga['subcategory_id']); $nai=mysqli_fetch_array($sql); echo $nai['subcategory_name'];?></td>
                                               <td><?php echo $na['amount']-$ga['prate'];?></td>

                                               <td><img style="width:50px;" src="../images/product/<?php $img=explode(",",$ga['product_images']); echo $img[0];?>"></td>
                                               <td><?php echo date("d-m-Y",strtotime($na['created_on']));?></td>


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
                <!-- BEGIN quantity MODAL MARKUP -->
                <div class="modal fade" id="quantityModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="simpleModalLabel">Save Quantity</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <label for="email1" class="control-label">Product</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="product_id" id="product_id" class="form-control" readonly>
                                                <input type="text" name="product_name" id="product_name" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <label for="email1" class="control-label">Quantity</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="number" name="product_quantity" id="product_quantity" class="form-control" placeholder="Quantity">
                                            </div>
                                        </div>


                                    </div>
                                   </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- END SIMPLE MODAL MARKUP -->
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
        });
}

function update_quantity(product_id,product,quantity){
        document.getElementById('product_name').value=product;
        document.getElementById('product_quantity').value=quantity;
    document.getElementById('product_id').value=product_id;
}


</script>
</body>
</html>
