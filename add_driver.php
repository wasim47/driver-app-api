<?php
include('db.php');
if(isset($_REQUEST['phone']) && isset($_REQUEST['password'])) {
    $phone=$_REQUEST['phone'];
    $password=md5($_REQUEST['password']);
    $name=$_REQUEST['name'];
    $dob=$_REQUEST['dob'];
    $gender=$_REQUEST['gender'];
    $exp=$_REQUEST['exp'];
    $address=$_REQUEST['address'];
    $emargency_con_p=$_REQUEST['emargency_con_p'];
    $emargency_con_n=$_REQUEST['emargency_con_n'];
    $relationship=$_REQUEST['relationship'];
	//$car_info=$_REQUEST['car_info'];
	$oil_info=$_REQUEST['oil_info'];
	$token=$_REQUEST['token'];
        
    $sql="INSERT INTO driver_info VALUES('', '$phone', '$name', '$dob', '$gender', '$exp', '$address','$emargency_con_p','$emargency_con_n','$relationship','','$oil_info','$token','','')";
    $db->query($sql);
    
    $sql="INSERT INTO user_table VALUES('', '$phone', '$password', '1')";
    $db->query($sql);  
    
    $data['action']="success";
    echo json_encode($data);
}
else {
    $data['action']="failed";
    echo json_encode($data);
}
?>