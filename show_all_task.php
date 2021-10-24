<?php

include('db.php');
    //echo 'dfdfd';
	if(isset($_POST['task_id']) && $_POST['task_id']!=""){	
			if(isset($_POST['driver_id']) && $_POST['driver_id']!=""){
				$driver_id = $_POST['driver_id'];
		
				$sql="SELECT dt.*, di.name FROM driver_task AS dt LEFT JOIN driver_info as di ON dt.driver_id=di.id WHERE dt.driver_id = '".$driver_id."' AND id='".$_POST['task_id']."' ORDER by dt.id DESC";
			}
			elseif(isset($_POST['today']) && $_POST['today']!=""){
				$today = $_POST['today'];
                //dt.date = '".$today."' AND
                
				$sql="SELECT dt.*, di.name FROM driver_task AS dt LEFT JOIN driver_info as di ON dt.driver_id=di.id WHERE dt.id='".$_POST['task_id']."' ORDER by dt.id DESC";
			}
			elseif(isset($_POST['comming']) && $_POST['comming']!=""){
				$comming = $_POST['comming'];
		
				$sql="SELECT dt.*, di.name FROM driver_task AS dt LEFT JOIN driver_info as di ON dt.driver_id=di.id WHERE dt.date > '".$comming."' AND idt.d='".$_POST['task_id']."' ORDER by dt.id DESC";
			}
			elseif(isset($_POST['past']) && $_POST['past']!=""){
				$past = $_POST['past'];
		
				 $sql="SELECT dt.*, di.name FROM driver_task AS dt LEFT JOIN driver_info as di ON dt.driver_id=di.id WHERE dt.date < '".$past."' AND dt.id='".$_POST['task_id']."' ORDER by dt.id DESC";
			}		
	}
	else{
			if(isset($_POST['driver_id']) && $_POST['driver_id']!=""){
				$driver_id = $_POST['driver_id'];	
				$sql="SELECT dt.*, di.name FROM driver_task AS dt LEFT JOIN driver_info as di ON dt.driver_id=di.id WHERE dt.driver_id = '".$driver_id."' ORDER by dt.id DESC";    
			}
			elseif(isset($_REQUEST['today']) && $_REQUEST['today']!=""){
				$today = $_REQUEST['today'];
                //echo 'dfdfderere';
		//WHERE dt.date = '".$today."' AND
				$sql="SELECT dt.*, di.name FROM driver_task AS dt LEFT JOIN driver_info as di ON dt.driver_id=di.id  ORDER by dt.id DESC";
			}
			elseif(isset($_POST['comming']) && $_POST['comming']!=""){
				$comming = $_POST['comming'];
		
				$sql="SELECT dt.*, di.name FROM driver_task AS dt LEFT JOIN driver_info as di ON dt.driver_id=di.id WHERE dt.date > '".$comming."' ORDER by dt.id DESC";
			}
			elseif(isset($_POST['past']) && $_POST['past']!=""){
				$past = $_POST['past'];
		
				 $sql="SELECT dt.*, di.name FROM driver_task AS dt LEFT JOIN driver_info as di ON dt.driver_id=di.id WHERE dt.date < '".$past."' ORDER by dt.id DESC";
			}
		
   }

//$sql="SELECT dt.*, di.name FROM driver_task AS dt LEFT JOIN driver_info as di ON dt.driver_id=di.id ORDER by dt.id DESC";

///array($driver_id)
$result=$db->query($sql);
$data=array();
if($result->num_rows>0) {
    while($row = $result->fetch_assoc()) {
        $data[]=$row;
    }
    echo json_encode($data);
}
?>
