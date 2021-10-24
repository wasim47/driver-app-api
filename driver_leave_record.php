<?php
include('db.php');
if(isset($_REQUEST['usercontact'])) {
    $usercontact=$_REQUEST['usercontact'];
    $status=$_REQUEST['status'];
    $date=date('Y-m-d');
    $start_time=$_REQUEST['start_time'];
    $end_time=$_REQUEST['end_time'];
    $remarks=$_REQUEST['remarks'];
    
    $selectData = "SELECT * FROM driver_info WHERE phone = $usercontact";
	$result=$db->query($selectData);
	$row = $result->fetch_assoc();
	$driver_id = $row['id'];
	/*$stmt=$db->prepare($selectData);    
   
    $stmt->bind_param("s", $usercontact);
	$stmt->execute();
    $result = $stmt->get_result();
	//$num_of_rows = $result->num_rows;
	
	$row = $result->fetch_array();
	print_r($row);
	$driver_id = $row['id'];*/
	
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

   /* $stmt=$db->prepare("INSERT INTO driver_duty_status (driver_id,status,date,start_time,end_time,remarks) VALUES(?)");
	$stmt->bind_param('ssssss', $driver_id,$status,$date,$start_time,$end_time,$remarks);
    $stmt->execute();
	$stmt->close();  */ 
	
	
	$sql="INSERT INTO driver_duty_status (driver_id,status,date,start_time,end_time,remarks) VALUES('$driver_id','$status','$date','$start_time','$end_time','$remarks')";
    $db->query($sql);
    
    $data['action']="success";
    echo json_encode($data);
}
else {
    $data['action']="failed";
    echo json_encode($data);
}
?>