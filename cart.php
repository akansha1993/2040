<?php include('includes/header.php'); ?>
<div class="container">
	<div class="cart1">
	<?php if(!empty($_SESSION['cart_item'])){?>

	<div class="col-md-12">
		<p class="cart_head">Your Cart (<?php echo count($_SESSION['cart_item']);?>)</p>
	</div>
	<div class="clearfix"></div>
	
	<table class="table cart_tab">
		<thead>
			<tr>
				<th></th>
				<th>ITEM</th>
				<th>QTY</th>
				<th>PRICE</th>
			 <th>SIZE</th>
				<th>SUBTOTAL</th>
			</tr>
		</thead>
		
		<tbody>
		<?php 
		$total=0;
		foreach ($_SESSION['cart_item'] as $item) {
			$total+=$item['price'];?>
			<tr>
				<td><img class="img-responsive" src="<?php echo url('images/product/'.$item['img']);?>" style="width:70px !important;"> </td>
				<td><b><?php echo $item['name'];?></b>
				</td>
				<td>
					<input type="text" name="qty" value="<?php echo $item['quantity'];?>">
				</td>
				<td>
					<div class="price1"><i class="fa fa-inr"></i> <?php echo $item['price']; ?></div>
					 
				</td>
				<td>
					<div class="price1"><?php echo $item['size']; ?></div>
					 
				</td>
				 
				<td>
					<div class="subtotal"><b>SUBTOTAL : <i class="fa fa-inr"></i>  <?php echo $item['price']; ?></b> </div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4" class="text-right">TOTAL</th>
				<th><i class="fa fa-inr"></i> <?php echo $total; ?></th>
			</tr>
		</tfoot>
	</table>
	<div class="btn_ec pull-right">
		<a  href="index.php" class="btn btn-default"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Continue Shopping</button>
		<a  href="<?php if(empty($_SESSION['client_id'])){ echo "login.php";} else{ echo "checkout.php"; }?>" class="btn btn-success">PLACE ORDER</a>
	</div>
	<div class="clearfix"></div>
	<?php } else { ?><div class="col-md-12" style="height: 150px; padding-top: 150px; padding-bottom: 150px;" >
		<div class="allower1"><h3 style="padding-top: ;"><?php echo "Your Cart is Empty ";?></h3></div>
		</div>
		<div class="clearfix"></div>
		<?php 
		 }?>
</div>
</div>	
<?php include('includes/footer.php'); ?>	