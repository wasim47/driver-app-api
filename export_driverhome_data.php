<?php
include('db.php');
header('Content-Type: text/csv; charset=utf-8');  
header('Content-Disposition: attachment; filename=driver.csv');  
$output = fopen("php://output", "w");  

/*fputcsv($output, array('ID', 'Name', 'Phone', 'Date of Birth', 'Gender','Address'));  
$query = "SELECT id,name,phone,dob,gender,address FROM driver_info ORDER BY id DESC"; */ 

fputcsv($output, array('ID', 'name', 'phone', 'Date of Birth', 'gender','experience','address','Emergency Contact Person','Emergency Contact','relationship','Car Info'));  
$query = "SELECT id,name,phone,dob,gender,experience,address,emergency_contact_person,emergency_contact_no,relationship,car_info FROM driver_info ORDER BY id DESC"; 
$result = $db->query($query);  
while($row = $result->fetch_assoc())  
{  
   fputcsv($output, $row);  
}  
fclose($output);  	


//$data['action'] = 'success';
//echo json_encode($data);
?>