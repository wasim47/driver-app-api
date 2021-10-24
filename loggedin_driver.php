<?php

include('db.php');

if(isset($_REQUEST['driverid']) && $_REQUEST['driverid']!=""){
    $driver_id = $_REQUEST['driverid'];
    //$sql="SELECT * FROM driver_info WHERE phone = '".$driver_id."' ORDER by id DESC";
	$sql="SELECT * FROM driver_info AS di LEFT JOIN driver_task AS dt ON di.id=dt.driver_id WHERE di.phone = '".$driver_id."' ORDER by di.id DESC";
}

$db->set_charset("utf8");
$result=$db->query($sql);
$data=array();
if($result->num_rows>0) {
    while($row = $result->fetch_assoc()) {
        $data[]=$row;
    }
    echo json_encode($data);
}
?>