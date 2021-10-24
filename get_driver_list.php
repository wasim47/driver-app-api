<?php 

include('db.php');



$sql = "SELECT * FROM driverdetails";



$result = $db->query($sql);

$driverList = array();

//$worlList = array();

$i=0;

if($result->num_rows>0) {

    while($driver = $result->fetch_assoc()) {

		$dutyhistory = array();

		$result2 = $db->query("SELECT * FROM driverdutyhistory WHERE DriverID=".(int)$driver['DriverID']." LIMIT 1");

		if($result2->num_rows>0) {

			while($row2 = $result2->fetch_assoc()) {

				$dutyhistory = $row2;

			}

		}

		

		$worlList = array();

		$result3 = $db->query("SELECT * FROM driverworktaskhistory WHERE AssignedForDriverID=".(int)$driver['DriverID']);
		//echo '<pre>'; print_r($result3->fetch_assoc());

		if($result3->num_rows>0) {

			while($row3 = $result3->fetch_assoc()) {

				$worlList[] = $row3;

			}

		}

		

		$leaveApplicationList = array();

		$result4 = $db->query("SELECT * FROM driverleaveapplicationhistory WHERE ApplicationSubmittedBy=".(int)$driver['DriverID']);

		if($result4->num_rows>0) {

			while($row4 = $result4->fetch_assoc()) {

				$leaveApplicationList[] = $row4;

			}

		}

		
		//$worlList = $worlList;
		$driveBackHomeList = array();

		$result5 = $db->query("SELECT * FROM drivebackhomehistory WHERE ApplicationSubmittedBy=".(int)$driver['DriverID']);

		if($result5->num_rows>0) {

			while($row5 = $result5->fetch_assoc()) {

				$driveBackHomeList[] = $row5;

			}

		}

      

		$driverList['driverList'][$i] = $driver;

		$driverList['driverList'][$i]['driverdutyhistory'] = $dutyhistory[0];

		$driverList['driverList'][$i]['driverWorkList'] = $worlList[0];

		$driverList['driverList'][$i]['leaveApplicationList'] = $leaveApplicationList[0];

		$driverList['driverList'][$i]['driveBackHomeList'] = $driveBackHomeList[0];

									 

		$i++;

    }

}

//echo '<pre>';print_r($driverList);

//$dtaretrive = array(“driverList”=>$driverList);
echo  json_encode($driverList);