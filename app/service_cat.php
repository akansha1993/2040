<?php

include_once('config.php');

if(!empty($_POST['service_cat_name']))
{

	$response=array();

	$service_cat_name=isset($_POST['service_cat_name'])?mysqli_real_escape_string($con,$_POST['service_cat_name']):'';
	$status=isset($_POST['status'])?mysqli_real_escape_string($con,$_POST['status']):'';
    $allowedExts = array("jpg", "jpeg", "gif", "png");
    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
	$checkuser=mysqli_query($con,"select * from service_category where service_cat_name='".$service_cat_name."'");

	if(mysqli_num_rows($checkuser)==1)

	{

		$response=array('msg'=>'already inserted');
		echo json_encode(array('Service Subcategory'=>$response));

	}else{

		mysqli_query($con,"insert into service_category set service_cat_name='".$service_cat_name."',status='".$status."'");

		$id=mysqli_insert_id($con);
        if (in_array($extension, $allowedExts)) {

                            $img = "servicecat-" . $id . "." . $extension;

                           
                            move_uploaded_file($_FILES['image']['tmp_name'], "images/servicecat/" . $img);
                             mysqli_query(GFHConfig::$link, "update service_category set image='" . $img . "' where id=" . $id);
                        }
		

		$response=array('msg'=>'service category added','id'=>$id);
		echo json_encode(array('Service Subcategory'=>$response));

	}

	

}
else
{
	$response=array('msg'=>'Please enter name');
		echo json_encode(array('Service Subcategory'=>$response));
}

