<?php
include('db.php');

header('Content-Type: text/csv; charset=utf-8');  
header('Content-Disposition: attachment; filename=driver.csv');  
$output = fopen("php://output", "w");  

/*fputcsv($output, array('ID', 'Name', 'Phone', 'Date of Birth', 'Gender','Address'));  
$query = "SELECT id,name,phone,dob,gender,address FROM driver_info ORDER BY id DESC"; */ 

fputcsv($output, array('ID', 'Title', 'Date', 'Start Time', 'End Time','Passenger','Pickup','Destination','Details'));  
$query = "SELECT id,title,date,start_time,end_time,client,pickup,destination,details FROM driver_task ORDER BY id DESC"; 
$db->set_charset("utf8");
$result = $db->query($query);  
while($row = $result->fetch_assoc())  
{  
   fputcsv($output, $row);  
}  
fclose($output);  	


//$data['action'] = 'success';
//echo json_encode($data);
?>