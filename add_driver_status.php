<?php
include('db.php');
if(isset($_REQUEST['driver_id'])) {
    $driver_id=$_REQUEST['driver_id'];
    $status=$_REQUEST['status'];
    $date=date('Y-m-d',strtotime($_REQUEST['date']));
    $start_time=$_REQUEST['start_time'];
    $end_time=$_REQUEST['end_time'];
    $remarks=$_REQUEST['remarks'];

    /*$stmt=$db->prepare($selectData);    
   //$stmt->bind_param("s", $driver_id);
    $stmt->execute();
    $result = $stmt->get_result();
    print_r($result);
    if($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
            echo $row['status'];
        }
        
      $sql="UPDATE driver_duty_status SET status='".$status."', date='".$date."', start_time='".$start_time."', remarks='".$remarks."' WHERE driver_id='".$driver_id."'";
    }
    else{        
     $sql="INSERT INTO driver_duty_status VALUES('', '$driver_id', '$status', '$date', '$start_time', '$end_time', '$remarks','')";
        
    }*/

    $stmt=$db->prepare("INSERT INTO driver_duty_status (driver_id,status,date,start_time,end_time,remarks) VALUES(?)");
	$stmt->bind_param('ssssss', $driver_id,$status,$date,$start_time,$end_time,$remarks);
    $stmt->execute();
	$stmt->close();   
    
    $data['action']="success";
    echo json_encode($data);
}
else {
    $data['action']="failed";
    echo json_encode($data);
}
?>