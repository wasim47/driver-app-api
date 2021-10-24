<?php
include('db.php');
if(isset($_REQUEST['userid'])){
    $userid=$_REQUEST['userid'];
    $newpassword=md5($_REQUEST['newpassword']);
    $oldpassword=md5($_REQUEST['oldpassword']);
	
        
    $sql="SELECT * FROM user_table WHERE username='$userid' AND password='$oldpassword'";
	$result=$db->query($sql);
	if($result->num_rows > 0){
		
		$sql="UPDATE user_table SET password='$newpassword' WHERE username='$userid'";
		$db->query($sql);	   
		$data['action']="success";
	}
	else{
		$data['action']="Old Password is Wrong";
	}
}
else {
    $data['action']="failed";
}


echo json_encode($data);
?>