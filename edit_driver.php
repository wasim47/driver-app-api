<?php
include('db.php');
if(isset($_REQUEST['driver_id']) && $_REQUEST['driver_id']!="") {
    $phone=$_REQUEST['phone'];
   // $password=md5($_REQUEST['password']);
    $name=$_REQUEST['name'];
    $dob=$_REQUEST['dob'];
   // $gender=$_REQUEST['gender'];
    $exp=$_REQUEST['exp'];
    $address=$_REQUEST['address'];
    $driverId=$_REQUEST['driver_id'];
    
    
        
    $sql="UPDATE driver_info SET name='".$name."',phone='".$phone."',dob='".$dob."',address='".$address."',experience='".$exp."' WHERE id='".$driverId."'";
    /* ('', '$phone', '$name', '$dob', '$gender', '$exp', '$address')"; */
    $db->query($sql);
    
   /* $sql="INSERT INTO user_table VALUES('', '$phone', '$password', '1')";
    $db->query($sql);  */
    
    $data['action']="success";
    echo json_encode($data);
}
else {
    $data['action']="failed";
    echo json_encode($data);
}
?>