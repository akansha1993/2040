<?php

include_once('config.php');

if(isset($_POST['userid']))
{

	$response=array();

	$userid=isset($_POST['userid'])?mysqli_real_escape_string($con,$_POST['userid']):'';
	
	$name=isset($_POST['name'])?mysqli_real_escape_string($con,$_POST['name']):'';

	$email=isset($_POST['email'])?mysqli_real_escape_string($con,$_POST['email']):'';

	$phone=isset($_POST['phone'])?mysqli_real_escape_string($con,$_POST['phone']):'';
	
	$address=isset($_POST['address'])?mysqli_real_escape_string($con,$_POST['address']):'';

	
	$result=mysqli_query($con,"update  users set name='".$name."',email='".$email."',phone='".$phone."',address='".$address."',entry_date=now(),status=1 where id='".$userid."'");

		if($result)
		{
			$querys=mysqli_query($con,"select * from users where id='".$userid."'");
			$query=mysqli_fetch_assoc($querys);
			$userdata['name']=$query['name'];
			$userdata['email']=$query['email'];
			$userdata['phone']=$query['phone'];
			$userdata['address']=$query['address'];
			echo json_encode(array('status'=>'success','update'=>$userdata));
		}else{
			echo json_encode(array('status'=>'failed'));
		}

}

