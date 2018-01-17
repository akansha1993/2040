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
                                    <li class=" <?php if(empty($_GET['q'])){ echo 'active';}?>"><a href="#first2">Top Products</a></li>
                                    <li class="<?php if(!empty($_GET['q'])){ echo 'active';}?>"><a href="#second2"><?php if(empty($_GET['q'])){ echo'Add Top Product';} else{echo'Edit Top Product';}?> </a></li>
                               </ul>
                                <header><?php if(empty($_GET['q'])){ echo'Top Products';} else{echo'Edit Top Product';}?> </header>
                            </div>
                            <div class="card-body tab-content"> 
                                <div class="tab-pane <?php if(empty($_GET['q'])){ echo 'active';}?>" id="first2">
                                    <div class="table-responsive">
                                        <?php if(isset($_POST['product_id']) && !empty($_POST['product_id'])){
                                            $GFH_Admin->update_topproductquantity();
                                        }
                                        if(isset($_POST['name'])){
                                            $GFH_Admin->topproduct(isset($_GET['q'])?$_GET['q']:'');
                                        }

                                        if(isset($_GET['delete']))
                                        {
                                            $GFH_Admin->deletetopproduct($_GET['delete']);
                                        }?>
                                        <table id="example" class="table order-column hover">
                                        <thead>

                                            <th>Sort</th>

                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Created On</th>
                                            <th>Action</th>

                                        </thead>
                                        <tbody>
                                        <?php $i=1;
                                        $sql1= $GFH_Admin->getalltopproduct();
                                       while( $na=mysqli_fetch_array($sql1)){?>
                                        <tr class="gradeX <?php if($na['quantity']<= 11){echo "style-danger";}?>">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $na['prod_name'];?></td>
                                            <td><?php echo $na['quantity'];?></td>
                                            <td><?php echo $na['prod_price'];?></td>
                                            <td><?php $sql=$GFH_Admin->getCategory($na['category_id']); $nai=mysqli_fetch_array($sql); echo $nai['category_name'];?></td>
                                            <td><?php $sql=$GFH_Admin->getsubCategory($na['subcategory_id']); $nai=mysqli_fetch_array($sql); echo $nai['subcategory_name'];?></td>
                                            <td><?php if($na['prod_status']=='1'){echo 'Active';}else{
                                            echo "Inactive";
                                                }?></td>

                                            <td><img style="width:50px;" src="../images/topproduct/<?php  echo $na['thumb'];?>"></td>
                                            <td><?php echo date("d-m-Y",strtotime($na['created_on']));?></td>

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn ink-reaction btn-flat  btn-primary" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-chevron-down"></i> Action </button>
                                                    <ul class="dropdown-menu no-padding" role="menu">
                                                        <li><a href="#" onclick="update_quantity('<?php echo $na['prod_id'];?>','<?php echo $na['prod_name'];?>','<?php echo $na['quantity'];?>');" class="ink-reaction btn-flat btn-warning"  data-toggle="modal" data-target="#quantityModal">Update Quantity</a></li>
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?q=<?php echo $na['prod_id'];?>" class="ink-reaction btn-flat btn-warning"><i class="fa fa-edit"></i> Edit
                                                            </a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="<?php $_SERVER['PHP_SELF'];?>?delete=<?php echo $na['prod_id'];?>" class="ink-reaction btn-flat btn-danger"><i class="fa fa-remove"> </i> Delete
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
                                            $sl=$GFH_Admin->gettopproduct($_GET['q']);
                                            $naa=mysqli_fetch_array($sl);
                                        }?>
                                        <div class="row">
                                       <div class="col-md-10">
                                           <div class="form-group">
                                               <input type="text" class="form-control" id="prod_name" value="<?php echo isset($naa['prod_name'])?$naa['prod_name']:'';?>" name="name"
                                                      required="" aria-required="true">
                                               <label for="Email1">Product Name </label>
                                           </div>
                                       </div>

                                            <div class="col-md-2">
                                                <label for="select1">Status</label>
                                                <div>
                                                    <label class="radio-inline radio-styled">
                                                        <input type="radio" name="prod_status" value="1" checked><span>Active</span>
                                                    </label>
                                                    <label class="radio-inline radio-styled">
                                                        <input type="radio" name="prod_status" value="0"><span>Deactive</span>
                                                    </label>
                                                </div>


                                                </div>

                                            <div class="col-md-3">
                                               <div class="form-group floating-label">
                                                   <select id="category_id" onchange="subcat(this.value);" name="category_id" class="form-control" required=""
                                                           aria-required="true">
                                                       <option value="">Select Category</option>
                                                       <?php $sql=$GFH_Admin->getCategory();
                                                       while($cat=mysqli_fetch_array($sql)){?>
                                                       <option value="<?php echo $cat['category_id'];?>" <?php if($naa['category_id']== $cat['category_id']){ echo 'selected'; }?>><?php echo $cat['category_name'];?></option>
                                                        <?php } ?>

                                                   </select>
                                                   <label for="select1">Category</label>
                                               </div>
                                           </div>
                                             <div class="col-md-3">
                                               <div class="form-group floating-label">
                                                   <select name="size_id" class="form-control" required=""
                                                           aria-required="true">
                                                       <option value="">Select Size</option>
                                                       <?php $sql=mysqli_query($GFH_Admin::$link,"SELECT * FROM size_category");
                                                       while($cat=mysqli_fetch_array($sql)){?>
                                                       <option value="<?php echo $cat['id'];?>" <?php if($naa['size_id']== $cat['id']){ echo 'selected'; }?>><?php echo $cat['title'];?></option>
                                                        <?php } ?>

                                                   </select>
                                                   <label for="select1">Size Category</label>
                                               </div>
                                           </div>
                                            <div class="col-md-3">
                                                <div class="form-group floating-label">
                                                    <select id="subcategory_id" name="subcategory_id" class="form-control" required="" aria-required="true">
                                                        <?php if(!empty($naa['subcategory_id'])){
                                                            $subca=$GFH_Admin->getsubCategory($naa['subcategory_id']);
                                                            while($subcat=mysqli_fetch_array($subca)){
                                                                print_r($subcat);?>
                                                            <option value="<?php echo $subcat['subcategory_id']?>" <?php if($naa['subcategory_id']== $subcat['subcategory_id']){ echo 'selected'; }?>><?php echo $subcat['subcategory_name'];?></option>
                                                        <?php } }?>
                                                    </select>
                                                    <label for="select1">Sub Category</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select id="discount_id" name="discount_id" class="form-control"
                                                            aria-required="true">
                                                        <option value="">None</option>
                                                        <?php $sql=$GFH_Admin->getdiscount();
                                                        while($dis=mysqli_fetch_array($sql)){?>
                                                            <option value="<?php echo $dis['discount_id'];?>" <?php if($naa['discount_id']== $dis['discount_id']){ echo 'selected'; }?>><?php echo $dis['discount_title'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="select1">Discount</label>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="file"  name="thumb" style="width: 0.1px; height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;" id="file-2" class="inputfile inputfile-1" data-multiple-caption="{count} files selected"  />
                                                    <label style="
    color: #f1e5e6;
    background-color: #d3394c;" for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Upload Thumb Image…</span></label>

                                                     </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="file" multiple name="image[]" style="width: 0.1px; height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected"  />
                                                    <label style="
    color: #f1e5e6;
    background-color: #d3394c;" for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Choose Multiple Images…</span></label>

                                                </div>
                                            </div>
                                        </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input id="tags" name="tags[]"  value="<?php echo isset($naa['tags'])?$naa['tags']:'';?>" data-role="tagsinput"/>
                                                    <label for="select1">Tags</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select id="discount_id" name="brand_id" class="form-control"
                                                            aria-required="true">
                                                        <?php $sql=$GFH_Admin->getbrand();
                                                        while($dis=mysqli_fetch_array($sql)){?>
                                                            <option value="<?php echo $dis['brand_id'];?>"  ><?php echo $dis['brand_name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="select1">Brand</label>
                                                </div>
                                            </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text"  name="prate" value="<?php echo isset($naa['prate'])?$naa['prate']:'';?>"class="form-control">

                                                <label for="select1"> Purchase Rate</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text"  name="mrate" value="<?php echo isset($naa['mrate'])?$naa['mrate']:'';?>"class="form-control">

                                                <label for="select1"> Market Price</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" required id="fresh_price"  name="fresh_price" class="form-control" value="<?php echo isset($naa['fresh_price'])?$naa['fresh_price']:'';?>">

                                                <label for="select1"> Price Without GST </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text"  onkeyup="calculategst(document.getElementById('fresh_price').value,this.value);"  name="gst" value="<?php echo isset($naa['gst'])?$naa['gst']:'';?>"class="form-control" required="">

                                                <label for="select1">GST In Percentage</label>
                                            </div>
                                        </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" id="selling_price" readonly name="prod_price" value="<?php echo isset($naa['prod_price'])?$naa['prod_price']:'';?>"class="form-control" required="">

                                                    <label for="select1">Selling Price</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text"  name="shipping" value="<?php echo isset($naa['shipping'])?$naa['shipping']:'';?>"class="form-control" required="">

                                                    <label for="select1">Shipping Price</label>
                                                </div>
                                            </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text"  name="hsn_code" value="<?php echo isset($naa['hsn_code'])?$naa['hsn_code']:'';?>"class="form-control" required="">

                                                <label for="select1">HSN CODE </label>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="checkbox checkbox-styled tile-text pull-right">
                                                <label>
                                                    <input type="checkbox" name="pramotion" value="1">
                                                    <span>
												Add To
												<small>Promotion</small>
											</span>
                                                </label>
                                            </div>
                                        </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>Product Discription</h4>
                                                    	<textarea name="prod_description" class="form-control control-12-rows summernote"
                                                                  placeholder="Enter text ..."><?php echo isset($naa['prod_description'])?$naa['prod_description']:''?></textarea>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>Product Specification</h4>
                                                    	<textarea name="prod_specification" class="form-control control-12-rows summernote"
                                                                  placeholder="Enter text ..."><?php echo isset($naa['prod_specification'])?$naa['prod_specification']:''?></textarea>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>Product Features</h4>
                                                    	<textarea name="prod_features" class="form-control control-12-rows summernote"
                                                                  placeholder="Enter text ..."><?php echo isset($naa['prod_features'])?$naa['prod_features']:''?></textarea>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>Product Disclaimer</h4>
                                                    <textarea name="prod_disclamer" class="form-control control-12-rows summernote"
                                                              placeholder="Enter text ..."><?php echo isset($naa['prod_disclamer'])?$naa['prod_disclamer']:''?></textarea>

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

function calculategst(price,gst) {

    if(price=="")
    { alert('please enter product price without gst');}
    else{
     var gst_price = +price+ (price/100)*gst;

    document.getElementById('selling_price').value= gst_price;
    }
}

</script>
</body>
</html>
