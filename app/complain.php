<?php
require_once('../admin/includes/config.php');
require_once('../admin/includes/function.php');



if(isset($_POST['complaint']) && !empty($_POST['complaint'])){
    $name=$_POST['firstname']." ".$_POST['lastname'];
    $email=  $_POST['email'];
    $phone= $_POST['phone'];
    $address=  $_POST['address'];
    $type= $_POST['type'];
    $category= $_POST['category_id'];
    $subcategory=$_POST['subcategory'];
    $product=$_POST['product'];
    $date=$_POST['date'];
    $invoice=isset($_POST['invoice'])?$_POST['invoice']:'';
    $place=$_POST['place'];
    $details=$_POST['details'];
    $complaint_no='fab'.time() . rand(10*45, 100*98);
    $sql=mysqli_query(GFHConfig::$link,"INSERT INTO `complaint_registration`(`name`, `email`, `phone`, `address`, `type`, `category`, `subcategory`, `product`, `date`, `place_of_purchase`, `details`,`complaint_no`)
 VALUES ('$name','$email','$phone','$address','$type','$category','$subcategory','$product','$date','$place','$details','$complaint_no')" );

    $text="Dear Customer your Fabiano ".$type."Request number is ".$complaint_no;
    $url="user=fabiano&pwd=Fabiano4141&route=Transactional&sender=Fabino&mobileno=".$phone."&text=".$text;
    $ch=curl_init("http://www.smsnmedia.com/api/push?");
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result=curl_exec($ch);
    curl_close($ch);


    $to = 'customercarefabiano@gmail.com';
    $subject = 'Fabiano '.$type;

    $message='<p>Hi Admin,</p><br><p>You have New '.$type.' Details mentained below !!! </p><br><table>
<tr>
<td width="170px" style="font-weight: bold">Name  </td>
<td width="50px">:</td>
<td>'.$name.'</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Email address </td>
<td width="50px">:</td>
<td>'.$email.'</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Phone number </td>
<td width="50px">:</td>
<td>'.$phone.'</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Address </td>
<td width="50px">:</td>
<td>'.$address.'</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Complaint type </td>
<td width="50px">:</td>
<td>'.$type.'</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Product </td>
<td width="50px">:</td>
<td>'.$product.'</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">invoice No</td>
<td width="50px">:</td>
<td>'.$invoice.'</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Date of Purchase </td>
<td width="50px">:</td>
<td>'.$date.'</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Place of purchase </td>
<td width="50px">:</td>
<td>'.$place.'</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">Details </td>
<td width="50px">:</td>
<td>'.$details.'</td>
</tr>
<tr>
<td width="170px" style="font-weight: bold">complaint No.</td>
<td width="50px">:</td>
<td>'.$complaint_no.'</td>
</tr>
</table>';


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
    $headers .= 'From: <admin@fabianoappliances.com>' . "\r\n";
    $headers .= 'Cc: info@fabianoappliances.com' . "\r\n";

    $sentmail = mail($to, $subject, $message, $headers);

    $to1 = $email;
    $subject1 = 'Fabiano '.$type;

    $message1='<p>Hi '.$name.',</p><br><p>We have recieved Your '.$type.' Request!!!<br> 
Your '.$type.' Request No is #'.$complaint_no.'</p><table>
';


    $headers1 = "MIME-Version: 1.0" . "\r\n";
    $headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
    $headers1 .= 'From: <admin@fabianoappliances.com>' . "\r\n";
    $headers1 .= 'Cc: info@fabianoappliances.com' . "\r\n";

    $sentmail1 = mail($to1, $subject1, $message1, $headers1);
$response=array();
$response["status"]=1;
$response["req_number"]=$complaint_no;

echo json_encode($response);

}else {
 
$response=array();
$response["status"]=0;
$response["req_number"]="not registered / parameter missing";

echo json_encode($response);

}