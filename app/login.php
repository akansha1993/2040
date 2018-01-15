<?php

include_once('config.php');

if(!empty($_POST['email'])&&!empty($_POST['password']))

{

	$response=array();
	$responsedata=array();

	$email=isset($_POST['email'])?mysqli_real_escape_string($con,$_POST['email']):'';

	$password=isset($_POST['password'])?mysqli_real_escape_string($con,$_POST['password']):'';

	$check=mysqli_query($con,"select * from tbl_client where (email='".$email."' or phone='".$email."')");
	$check1=mysqli_fetch_assoc($check);
	if($check1['password']==$password)
	{
			$_SESSION['client_id'] = $check1['client_id'];
            $_SESSION['client_email'] = $check1['email'];
            $_SESSION['client_name'] = $check1['name'];
			$respdata['id']=$check1['client_id'];
			$respdata['name']=$check1['name'];
			$respdata['email']=$check1['email'];
			$respdata['phone']=$check1['phone'];
			$respdata['password']=$check1['password'];
			$respdata['entry_date']=$check1['created_on'];
			$resdat['login']=$respdata;
			//array_push($response,$resdat);

	echo json_encode($resdat);

	}else{

	   $response=array('status'=>'invalid');

	   echo json_encode($response);

	}

}