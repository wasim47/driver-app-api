<?php
include('db.php');

if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
    $username=$_REQUEST['username'];
    $password=md5($_REQUEST['password']);
    $sql="SELECT username,role FROM user_table WHERE username=? AND password=?";
    $stmt=$db->prepare($sql);
    
    $stmt->bind_param("ss", $username,$password);
    $stmt->execute();
    
    $stmt->bind_result($un, $role);
    $stmt->store_result();
    
    if($stmt->num_rows>0) {
        $data=array('login'=>'success');
        while ($stmt->fetch()) {
            $data['username']=$un;
            $data['role']=$role;
			
        }
        echo json_encode($data);
    }
    else {
        $data=array('login'=>'failed', 'error'=>'用戶名或密碼不匹配');
        echo json_encode($data);
    }
    /*$result = $stmt->get_result();
    if($result->num_rows>0) {
        $data=array('login'=>'success');
        while ($row = $result->fetch_assoc()) {
            $data['username']=$row['username'];
            $data['role']=$row['role'];
        }
        echo json_encode($data);
    }
    else {
        $data=array('login'=>'failed', 'error'=>'Username or Password Do Not Match');
        echo json_encode($data);
    }*/
}
else {
    $data=array('login'=>'failed', 'error'=>'Empty Fields');
    echo json_encode($data);
}
?>