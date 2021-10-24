<?php
$db = mysqli_connect("127.0.0.1", "thelived_rmdemo", "@rmdemo##", "thelived_driverapp");


    
	$username=$_REQUEST['username'];
    $password=md5($_REQUEST['password']);
    $sql=mysqli_query($db,"SELECT username,role FROM user_table WHERE username='".$username."' AND password='".$password."'");
    
    
    if(mysqli_num_rows($sql) > 0) {
        while ($stmt=mysqli_fetch_array($sql)) {
            $data['username']=$username;
            $data['role']=$password;
        }
       
		$data = array("status"=>"success");
    }
    else {
		$data = array("status"=>"Fail");
    }
    
	echo json_encode($data);
?>