<?php
include('db.php');
    $driver_id=$_REQUEST['driver_id'];
	$token=$_REQUEST['token'];
	$date('Y-m-d');
        
    $sql="INSERT INTO driver_token VALUES('', '$driver_id', '$token', '$date')";
    $db->query($sql);
     
?>