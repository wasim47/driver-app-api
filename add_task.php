<?php

include('db.php');
if(isset($_REQUEST['title']) && isset($_REQUEST['driver_id'])) {
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
        
    $sql="INSERT INTO driver_task VALUES('', '$title', '$driver_id', '$insertDate', '$start_time', '$end_time', '$clients', '$pickup','$destination', '$details')";
    $db->query($sql);
	$lasttaskid = $db->insert_id;
    
	$taskshow="SELECT * FROM driver_task WHERE id = '$lasttaskid'";
    $result=$db->query($taskshow);
	$rows = $result->fetch_assoc();
	
	$drivershow="SELECT * FROM driver_info WHERE id = '$driver_id'";
    $resultd=$db->query($drivershow);
	$rowd = $resultd->fetch_assoc();
	
    $data['action']="success";
	$data['task']=$rows["title"];
	$data['tasktime']='Start: '.$rows["start_time"].' Finish: '.$rows["end_time"];
	$data['client']=$rows["client"];
	$data['location']=$rows["pickup"].' to '.$rows["destination"];
	$data['driver']=$rowd["name"];
    echo json_encode($data);
}
else {
    $data['action']="failed";
	$data['task']=$rows["title"];
	$data['tasktime']='Start: '.$rows["start_time"].' Finish: '.$rows["end_time"];
	$data['client']=$rows["client"];
	$data['location']=$rows["pickup"].' to '.$rows["destination"];
	$data['driver']=$rowd["name"];
    echo json_encode($data);
}

?>