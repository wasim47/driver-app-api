<?php
include('db.php');
if(isset($_REQUEST['car_name'])) {
    $car_name=$_REQUEST['car_name'];
    $car_model=$_REQUEST['car_model'];
    $car_details=$_REQUEST['car_details'];
	$date = date('Y-m-d');
        
    $sql="INSERT INTO car_info VALUES('','$car_name','$car_model','$car_details','$date')";
    $db->query($sql);
    
    $data['action']="success";
    echo json_encode($data);
}
else {
    $data['action']="failed";
    echo json_encode($data);
}
?>