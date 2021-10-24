
<?php
include('db.php');
$db->set_charset("utf8");
/*if(isset($_POST['driver_id']) && $_POST['driver_id']!=""){
    $driver_id = $_POST['driver_id'];
    $sql="SELECT * FROM driver_info AS di LEFT JOIN driver_task AS dt ON dt.driver_id=di.id WHERE di.id = '".$driver_id."' ORDER by di.id DESC";
}
else{    
    $sql="SELECT * FROM driver_info AS di LEFT JOIN driver_task AS dt ON dt.driver_id=di.id ORDER by di.id DESC";
}*/

$response["driverinfo"] = array();

if(isset($_REQUEST['driver_id']) && $_REQUEST['driver_id']!=""){
	$driver_id = $_REQUEST['driver_id'];
	$sql="SELECT * FROM driver_info WHERE id = '".$driver_id." ORDER by id DESC";
}
else{
	$sql="SELECT * FROM driver_info ORDER by id DESC";
}
$result=$db->query($sql);
$data=array();
if($result->num_rows>0) {
    while($row = $result->fetch_assoc()) {
        $sqlT="SELECT * FROM driver_task WHERE driver_id = '".$row['id']."' ORDER by id DESC";
		$resultT=$db->query($sqlT);
		$rowT = $resultT->fetch_assoc();
		//$data[]=$row;
		
		$data['id'] = $row['id'];
		$data['name'] = $row['name'];
		$data['phone'] = $row['phone'];
		$data['dob'] = $row['dob'];
		$data['gender'] = $row['gender'];
		$data['experience'] = $row['experience'];
		$data['address'] = $row['address'];
		
		$data['title'] = $rowT['title'];
		$data['date'] = $rowT['date'];
		$data['start_time'] = $rowT['start_time'];
		$data['end_time'] = $rowT['end_time'];
		array_push($response["driverinfo"], $data);
    }
   
   echo json_encode($response);
   //echo 'dfdfd';
   // echo json_encode($data);
}
?>