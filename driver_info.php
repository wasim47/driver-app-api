<?php

include('db.php');

$sql="SELECT * FROM user_table AS ut LEFT JOIN driver_info as di ON ut.username=di.phone WHERE role='1' ORDER by ut.id DESC";

$result=$db->query($sql);
$data=array();
if($result->num_rows>0) {
    while($row = $result->fetch_assoc()) {
        $data[]=$row;
    }
	$arrayval = array("driverinfo"=>$data);
    echo json_encode($data);
}
?>