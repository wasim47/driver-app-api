<?php

include('db.php');

$sql="SELECT id,name FROM driver_info";

$result=$db->query($sql);
$data=array();
if($result->num_rows>0) {
    while($row = $result->fetch_assoc()) {
        $data[]=$row;
    }
    echo json_encode($data);
}
?>