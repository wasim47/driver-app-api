<?php
$db = mysqli_connect("127.0.0.1", "thelived_rmdemo", "@rmdemo##", "thelived_driverapp");

/*if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
if(isset($_REQUEST['username'])) {
    $username=$_REQUEST['username'];
    $sql=mysqli_query($db,"INSERT INTO user_table (username) VALUES ('".$username."')");
    echo 'Successfully Inserted';
}
else{
	echo "Failed to insert";
}*/


if (isset ($_POST["username"]) && isset ($_POST["password"])){
    $name = $_POST["username"];
    $email = md5($_POST["password"]);
} else {
    $name = "wasim";
    $email = "2223";
}

// Insert value into DB
$sql = "INSERT INTO user_table (username, password) VALUES ('$name', '$email');";
$res = mysqli_query($db,$sql);

//mysqli_close($conn);

if($res) {          
$response = array('status' => '1');                 
} else {
die("Query failed");
}

echo json_encode($res);
exit();
?>