<?php
include('db.php');
header('Content-Type: text/csv; charset=utf-8');  
header('Content-Disposition: attachment; filename=driver.csv');  
$output = fopen("php://output", "w");  

/*fputcsv($output, array('ID', 'Name', 'Phone', 'Date of Birth', 'Gender','Address'));  
$query = "SELECT id,name,phone,dob,gender,address FROM driver_info ORDER BY id DESC"; */ 

fputcsv($output, array('ID', 'Car Name', 'Model', 'Details', 'Date'));  
$query = "SELECT car_id,car_name,car_model,car_details,date FROM car_info ORDER BY car_id DESC"; 
$result = $db->query($query);  
while($row = $result->fetch_assoc())  
{  
   fputcsv($output, $row);  
}  
fclose($output);  	


//$data['action'] = 'success';
//echo json_encode($data);
?>