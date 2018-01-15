<?php

include_once('config.php');

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']))
{

	$response=array();

	$name=isset($_POST['name'])?mysqli_real_escape_string($con,$_POST['name']):'';

	$email=isset($_POST['email'])?mysqli_real_escape_string($con,$_POST['email']):'';

	$phone=isset($_POST['phone'])?mysqli_real_escape_string($con,$_POST['phone']):'';

	$password=isset($_POST['password'])?mysqli_real_escape_string($con,$_POST['password']):'';
	

	

    $checkuser=mysqli_query($con,"select * from tbl_client where email='".$email."'");

	if(mysqli_num_rows($checkuser)==1)

	{

		$response=array('id'=>'already_registered');
		echo json_encode(array('Registration'=>$response));

	}else{

		mysqli_query($con,"insert into tbl_client set name='".$name."',email='".$email."',phone='".$phone."',password='".$password."'");

		$id=mysqli_insert_id($con);

		

		$response=array('id'=>$id);
		echo json_encode(array('Registration'=>$response));

	}

	

}

