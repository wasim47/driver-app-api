<?php
include('db.php');
if(isset($_REQUEST['taskid'])) {
    $title=$_REQUEST['title'];
    $driver_id=$_REQUEST['driver_id'];
    $start_time=$_REQUEST['start_time'];
    $end_time=$_REQUEST['end_time'];
    $clients=$_REQUEST['clients'];
    $pickup=$_REQUEST['pickup'];
    $destination=$_REQUEST['destination'];
    $details=$_REQUEST['details'];
    
    $date=$_REQUEST['date'];
    $insertDate = date('Y-m-d', strtotime($date));
        
	$tid = $_REQUEST['taskid'];
    $sql="UPDATE driver_task SET 
	title='$title', 
	driver_id='$driver_id', 
	date='$insertDate', 
	start_time='$start_time', 
	end_time='$end_time', 
	client='$clients', 
	pickup='$pickup',
	destination='$destination', 
	details='$details' WHERE id='$tid'";
    $db->query($sql);
   
    $data['action']="success";
    echo json_encode($data);
}
else {
    $data['action']="failed";
    echo json_encode($data);
}

?>