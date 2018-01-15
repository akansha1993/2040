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

                                <header><?php if(empty($_GET['q'])){ echo'Products';} else{echo'Edit Product';}?> </header>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_POST['importSubmit'])){
                                    $GFH_Admin->bulk_product_upload();

                                }?>
                                <div class="col-md-8">
                                    <form method="post" class="form form-validate floating-label"  enctype="multipart/form-data" id="importFrm">

                                        <div class="col-md-8">

                                                <div class="form-group">
                                                    <h1 class="text-ultra-bold">Bulk Product Upload</h1>
                                                    <a href="example.csv" class="btn btn-flat btn-primary ink-reaction">Download CSV File</a>
                                                </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="file" multiple name="file" style="width: 0.1px; height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected"  />
                                                    <label style="
    color: #f1e5e6;
    background-color: #d3394c;" for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Choose a file…</span></label>

                                                </div>
                                                <div class="card-actionbar">
                                                    <div class="card-actionbar-row">
                                                        <button type="submit" name="importSubmit" class="btn btn-flat btn-primary ink-reaction">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>




                                    </form>
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
