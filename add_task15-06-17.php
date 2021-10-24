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
    
    $data['action']="success";
    echo json_encode($data);
}
else {
    $data['action']="failed";
    echo json_encode($data);
}

?>