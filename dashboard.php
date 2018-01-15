<?php include('includes/header.php'); ?>
<div class="container">
<?php 
					$sql= $GFH_Admin->getclient($_SESSION['client_id']);
                    $na=mysqli_fetch_array($sql); ?>
<div class="dashborad">
<h1>DASHBOARD</h1>
<div class="">
<ul class="nav nav-pills nav-stacked col-md-3">
  <li class="active"><a href="#tab_a" data-toggle="pill">Personal Details</a></li>
  <li><a href="#tab_b" data-toggle="pill">Order History</a></li>
  <li><a href="#tab_c" data-toggle="pill">
  	Earn By Refrence
  </a></li>
  <li><a href="#tab_e" data-toggle="pill">Uploaded Prescription</a></li>
  <li><a href="#tab_d" data-toggle="pill">Change Password</a></li>
</ul>
<div class="tab-content col-md-9">
        <div class="tab-pane active" id="tab_a">

      <form method="post">
                            <div class="shippiing-info">
                             
                                <div class="form-group col-md-6">
                                    <span class="required-lbl">* </span><label class="control-label" for="firstname">Full Name</label>
                                    <div class="controls">

                                        <input id="firstname"  name="fullname" value="<?php echo isset($na['fullname'])?$na['fullname']:'';?>"
                                               type="text" placeholder="" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <span class="required-lbl">* </span><label class="control-label" for="billingpostcode">Landmark</label>
                                    <div class="controls">
                                        <input id="landmark"  name="landmark" value="<?php echo isset($na['landmark'])?$na['landmark']:'';?>"  type="text" placeholder="" class="form-control" required="">
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <span class="required-lbl">* </span><label class="control-label" for="shippingaddress1">Shipping Address 1</label>
                                    <div class="controls">
                                        <textarea id="shippingaddress1"  name="shipping_add" placeholder="" class="form-control"><?php echo isset($na['shipping_add'])?$na['shipping_add']:'';?></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label" for="shippingaddress2">Shipping Address 2</label>
                                    <div class="controls">
                                        <textarea id="shippingaddress2"  placeholder="" class="form-control"name="shipping_add1"><?php echo isset($na['shipping_add1'])?$na['shipping_add1']:'';?></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <span class="required-lbl">* </span><label class="control-label" for="billingpostcode">Post Code</label>
                                    <div class="controls">
                                        <input id="billingpostcode"  value="<?php echo isset($na['pin'])?$na['pin']:'';?>" name="pin"  type="text" placeholder="" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="phone">Phone</label>
                                    <div class="controls">
                                        <input id="phone"  name="phone" value="<?php echo isset($na['phone'])?$na['phone']:'';?>"   placeholder="" class="form-control" required="">
                                    </div>
                                </div>


                               

                                <div >
                                   
                                    <div class="form-group col-md-6">
                                        <span class="required-lbl">* </span><label class="control-label "  for="shippingcountry">Shipping Country</label>
                                        <div class="controls">
                                            <select id="country" name ="country" class="form-control ">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <span class="required-lbl">* </span><label class="control-label"  for="shippingcountry">Shipping State</label>
                                        <div class="controls">
                                            <select name ="state" class="form-control " id ="state">        </select>
                                        </div>
                                    </div>
                                    <!--   Select Country (with states):   <select id="country" name ="country"></select> </br></br> -->
<script type= "text/javascript" src = "assets/js/countries.js"></script>
                        <script language="javascript">
                            populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
                            populateCountries("country2");
                            populateCountries("country2");
                        </script>



                                    <hr/>


                                    <div class="form-group col-md-12">
                                        <label class="control-label" for="billinginformation">Billing Address</label>
                                        <label><input type="checkbox" value="Y" id="same_as_shiping" onclick="document.getElementById('billingadd').disabled=this.checked;document.getElementById('billingadd1').disabled=this.checked;
                    document.getElementById('billingpostcode').disabled=this.checked;"/> same_as_shiping</label>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="required-lbl">* </span><label class="control-label" for="billingaddress1">Address 1</label>
                                        <div class="controls">
                                            <textarea id="billingadd" placeholder="" class="form-control" name="billing_add"><?php echo isset($na['billing_add'])?$na['billing_add']:'';?> </textarea>

                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="billingaddress2">Address 2</label>
                                        <div class="controls">
                                            <textarea id="billingadd1" placeholder="" class="form-control" name="billing_add1"><?php echo isset($na['billing_add1'])?$na['billing_add1']:'';?></textarea>
                                        </div>
                                    </div>



                                    <div class="form-group col-md-12">
                                        <label class="control-label" for="contactinformation" >Contact Information:</label>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="required-lbl">* </span><label class="control-label" for="emailaddress">Email Address</label>
                                        <div class="controls">
                                            <input id="email" name="email" value="<?php echo isset($na['email'])?$na['email']:'';?>" type="email" placeholder="" class="form-control" required="">
                                        </div>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="organization">Alternate Phone</label>
                                        <div class="controls">
                                            <input id="organization" type="text" placeholder="" class="form-control" name="alt_phone" value="<?php echo isset($na['alt_phone'])?$na['alt_phone']:'';?>">
                                        </div>
                                    </div>



                                </div>
 

                                <div class="form-group col-md-12">
                                    <div class="control-group confirm-btn">
                                        <label class="control-label" for="placeorderbtn"></label>
                                        <div class="controls">
                                            <button id="save" name="save" type="submit" class="btn btn-primary">Save Details</button>
                                        </div>
                                    </div>
                                </div>
                  
        </div>
        </form>
        </div>
        <div class="tab-pane" id="tab_b">
          <div class="row">
                                                        <?php $sql=$GFH_Admin->get_orderby_user($_SESSION['client_id']);
                                                        while($na=mysqli_fetch_array($sql)){?>
                                                        <div class="col-md-12">
                                                            <div class="s-cart-all" style="border: 1px solid #ccc;">
                                                                <div class="cart-form " style="color: #000 !important;">
                                                                    <div style="border:1px solid #ccc;">
                                                                        <div style="width: 99%;background-color: #f8f8f8;text-transform:uppercase;display: inline-flex;font-size: 20px;
margin:0px 5px 0px 5px;
"><strong>Order No. -</strong> <p style="margin-top: -5px;"> <?php echo $na['order_id'];?></p>
                                                                        </div>
                                                                        <?php $jk=$GFH_Admin->getshooping_cart($na['order_id']);
                                                                        while ($jl=mysqli_fetch_array($jk)){
                                                                            $p=$GFH_Admin->getproduct($jl['product_id']);
                                                                            $prod=mysqli_fetch_array($p);
                                                                            $im=explode(",",$prod['product_images']);?>
                                                                        <div style="float: left;width: 100%;padding: 15px 0px 15px 0px;border: 1px solid #cccccc;">
                                                                            <div class="col-md-2">
                                                                                <a href="product_detail.php?productid=<?php echo base64_encode($prod['prod_id']);?>&brand=<?php echo $prod['brand'];?>">
                                                                                    <img style="width: 20px; height: 30px;" src="images/product/<?php echo $im[0];?>"></a>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <?php echo $prod['prod_name'];?>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <?php echo $jl['quantity'];?>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <?php echo $jl['price'];?>
                                                                            </div>
                                                                        </div>
                                                                        <?php } ?>
                                                                        <div style="border-top: 1px solid #ccc;float: left;
width: 100%;padding: 10px 0px 10px 0px;
font-size: 15px;">
                                                                            <div class="col-md-6">
                                                                                <strong>Ordered On</strong> <?php echo date("D d, M, Y", strtotime($na['date']));?>
                                                                            </div>
                                                                            <div class="col-md-6" style="text-align: right;">
                                                                                <strong>Order Total</strong> Rs. <?php echo $na['amount'];?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
        </div>
        <div class="tab-pane" id="tab_c">
<div class="col-md-12 input_dash">
	<div class="col-md-3">
		<label>Name</label>
</div>             
<div class="col-md-9">
	<div class="col-md-6">
	<input type="text" name="first_name" placeholder="FIRST NAME" class="form-control">
</div>            
<div class="col-md-6">
	<input type="text" name="last" placeholder="LAST NAME" class="form-control">
</div>
</div>
	</div>
	<div class="clearfix"></div>
<div class="col-md-12 input_dash">
	<div class="col-md-3">
		<label>Email</label>
</div>             
<div class="col-md-9">
<div class="col-md-12">
	<input type="email" class="form-control" name="email" placeholder="Enter Your Email" >
</div>
</div>
	</div>
	<div class="clearfix"></div>

<div class="col-md-12 input_dash">
	<div class="col-md-3">
		<label>Phone</label>
</div>             
<div class="col-md-9">
<div class="col-md-12">
	<input type="text" class="form-control" name="email" placeholder="Enter Your Phone" >
</div>
</div>
	</div>
	<div class="clearfix"></div>

<div class="col-md-12 text-center">
	<button class="btn btn-success">Send Code</button>
</div>



        </div>
        <div class="tab-pane" id="tab_e">

<table class="table table-stripped">
	<tr>
		<td><img class="img-responsive" src="assets/images/prescription.jpg" width="100px"></td>
		<td style="vertical-align: middle;">Prescription Name</td>
		<td style="vertical-align: middle;"><i class="fa fa-clock-o" aria-hidden="true"></i> 29-NOV-2017</td>
		<td style="vertical-align: middle;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></td>
	</tr>
	<tr>
		<td><img class="img-responsive" src="assets/images/prescription.jpg" width="100px"></td>
		<td style="vertical-align: middle;">Prescription Name</td>
		<td style="vertical-align: middle;"><i class="fa fa-clock-o" aria-hidden="true"></i> 29-NOV-2017</td>
		<td style="vertical-align: middle;"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></td>
	</tr>
</table>


        </div>
        <div class="tab-pane" id="tab_d">
		<?php if(isset($_POST['password'])){
    $GFH_Admin->update_client_password($_SESSION['client_id']);
				}?>
            <form class="form-horizontal" action="my_account.php" method="post">
                                                    <fieldset>
                                                        <legend>Your Password</legend>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Password</label>
                                                            <div class="col-sm-10">
                                                              <input class="form-control" type="password" name="password" placeholder="password" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Password Confirm</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="password" name="cpass" placeholder="password confirm" required>

                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="buttons clearfix">

                                                        <div class="pull-right">
                                                            <input class="btn btn-danger g6 update_pass" type="submit" value="Update Password"  name="update_pass">
                                                        </div>
                                                    </div>
                                                </form>
                                                </div>

		</div><!-- tab content -->
</div><!-- end of container -->
	
</div>
</div>
<?php include('includes/footer.php'); ?>