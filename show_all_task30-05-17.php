<?php

include('db.php');

$sql="SELECT dt.title, di.name, dt.start_time, dt.end_time, dt.client, dt.location, dt.details FROM driver_task AS dt LEFT JOIN user_table as ut ON dt.driver_id=ut.id LEFT JOIN driver_info as di ON di.phone=ut.username  ORDER by dt.id DESC";

$result=$db->query($sql);
$data=array();
if($result->num_rows>0) {
    while($row = $result->fetch_assoc()) {
        $data[]=$row;
    }
    echo json_encode($data);
}
?>