<?php
include('db.php');
if(isset($_REQUEST['driverid'])) {
    $driver_id=$_REQUEST['driverid'];
    $latval=$_REQUEST['latval'];
    $longval=$_REQUEST['longval'];
	$datetime = date('Y-m-d H:i:s');
        
    $sql="UPDATE driver_info SET latval='".$latval."', longval='".$longval."', updatetime='".$datetime."' WHERE phone='".$driver_id."'";
    $db->query($sql);
   
    $data['action']="success";
    echo json_encode($data);
}
else {
    $data['action']="failed";
    echo json_encode($data);
}

?>