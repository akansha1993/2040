<?php include('includes/header.php');
if(empty($_SESSION['client_id'])){
 echo "<script>window.location='index.php';</script>";
}else{} ?> 
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="alrs">
				<div class="alupper" style="padding-top: 25PX; ">
					 
					<?php  if(isset($_POST['place_order']))
                    {
                       $GFH_Admin->checkout();

                    }
                    if(isset($_POST['save'])){
                        $GFH_Admin->client($_SESSION['client_id']);
                    }

					$sql= $GFH_Admin->getclient($_SESSION['client_id']);
                    $na=mysqli_fetch_array($sql); ?>
				</div><hr>
				<div class="allower">
					<div class="aladd" >
						<h3>&nbsp;&nbsp; Delivery Address</h3>
					</div><BR>
					<div class="addnew">
				 
						<div class="row">
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
                        </form>

                        </div>
					</div>
				</div>
				<div class="allower1">
					<h4>&nbsp;ORDER SUMMARY</h4>
					<br>

					<table class="table cart_tab">
		<thead>
			<tr>
				<th></th>
				<th>ITEM</th>
				<th>QTY</th>
				<th>PRICE</th>
			 
				<th>SUBTOTAL</th>
			</tr>
		</thead>
		
		<tbody>
		<?php

                                    $sum=0;
                                    $sql=$GFH_Admin->getcartby_user();
                                    
                                    if(mysqli_num_rows($sql)==0){ echo "<script>window.location='index.php';</script>";}
                                    while($vr=mysqli_fetch_array($sql)){

                                        $sl=$GFH_Admin->getproduct($vr['product_id']);
                                        $va=mysqli_fetch_array($sl);
                                        $sum+=$vr['price'];
                                        $_SESSION['total']=$sum;
                                        ?>
			<tr>
				<td><img class="img-responsive" src="<?php echo url('images/product/'.$va['thumb']);?>" width="70px"> </td>
				<td><b><?php echo $va['prod_name'];?></b>
				</td>
				<td>
					<input type="text" name="qty" value="<?php echo $vr['quantity'];?>">
				</td>
				<td>
					<div class="price1"><i class="fa fa-inr"></i> <?php echo $vr['price']; ?></div>
					 
				</td>
				 
				<td>
					<div class="subtotal"><b>SUBTOTAL : <i class="fa fa-inr"></i>  <?php echo $vr['price']; ?></b> </div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4" class="text-right">TOTAL</th>
				<th><i class="fa fa-inr"></i> <?php echo $sum; ?></th>
			</tr>
		</tfoot>
	</table>
				</div>
				


			</div>
			 
			</div>
		</div>
		<div class="col-md-4">
		<div class="alupper" style="padding-top: 25PX; ">
		<hr>
		</div>
			<div class="ls">
				<div class="aladd" style="margin-top: 20px;">
						<h3>&nbsp;&nbsp; PRICE DETAILS</h3>
				</div><BR>
				<div class="row">
					<div class="col-md-6">
						<h5 style="padding-left: 20px">Price(<?php echo count($_SESSION['cart_item']);?> items)</h5><br>
						<h5 style="padding-left: 20px">Deleivery Charges</h5><br><br>
						<h5 style="padding-left: 20px"><b>Amount Payable</b></h5><br><br>
					</div>
					<div class="col-md-6" >
						<h6><a href=""><i class="fa fa-inr" aria-hidden="true"><?php echo $sum; ?></i></a></h6><br>
						<h6>Free</h6><br><br>
						<h6><a href=""><i class="fa fa-inr" aria-hidden="true"><?php echo $sum; ?></i></a></h6>

					</div>

				</div>
			</div>
			<div class="allower1">
					<h4>&nbsp;PAYMENTS OPTIONS</h4>
					     <form method="post">
                                           <input type="hidden" name="amount" value="<?php echo $sum ;?>">

                                <?php $op=$GFH_Admin->get_cartsetting('','1');
                                while ($po=mysqli_fetch_array($op)){?>

                                <div class="control-group">
                                    <label class="control-label" for="iaccept"></label>
                                    <div class="controls">
                                        <label class="checkbox"  for="iaccept-0" style="color : #000;">
                                            <input type="radio" style="position: static !important;border-bottom-color: #000000!important; " checked="" name="payment_method" value="<?php echo $po['mode'];?>" id="iaccept-0">
                                            <?php echo $po['name'];?>
                                        </label>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>

                            <div class="form-group col-md-12">
                                <div class="control-group">
                                    <label class="control-label" for="iaccept"></label>
                                    <div class="controls">
                                        <label class="checkbox"  for="iaccept-0">
                                            <input type="checkbox" style="position: static !important;border-bottom-color: #000000;!important;" name="iaccept" id="iaccept-0" value="I accept the Teams and conditions" required="">
                                            I accept the <a href="" style="color : #1148d1;">Teams and conditions</a>
                                        </label>
                                    </div>
                                </div>

                                    <div class="control-group confirm-btn">
                                        <label class="control-label" for="placeorderbtn"></label>
                                        <div class="controls">
                                            <button id="save" name="place_order" type="submit" class="btn btn-primary">Place Order</button>
                                        </div>
                                    </div>


                                </div>
</form>
				</div><br>
		</div>
	</div>
</div>

<?php include('includes/footer.php'); ?> 
<script>
                    $("#same_as_shiping").on("change", function(){
                        if (this.checked) {
                            $("[name='billing_add']").val($("[name='shipping_add']").val());
                            $("[name='billing_add1']").val($("[name='shipping_add1']").val());
                            $("[name='billing_pin']").val($("[name='postcode']").val());
                        }
                    });
                </script>