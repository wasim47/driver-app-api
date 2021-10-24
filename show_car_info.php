<?php

include('db.php');

$sql="SELECT * FROM car_info ORDER by car_id DESC";

$result=$db->query($sql);
$data=array();
if($result->num_rows>0) {
    while($row = $result->fetch_assoc()) {
        $data[]=$row;
    }
    echo json_encode($data);
}
?>