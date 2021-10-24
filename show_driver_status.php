<?php

include('db.php');

$sql="SELECT * FROM driver_info AS di INNER JOIN driver_duty_status AS ds ON ds.driver_id=di.id ORDER by ds.id DESC";


 //$sql="SELECT * FROM user_table AS ut LEFT JOIN driver_info as di ON ut.username=di.phone WHERE ut.role='1' ORDER by ut.id DESC";
//$sql="SELECT * FROM driver_info ORDER by id DESC";

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