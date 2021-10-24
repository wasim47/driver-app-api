<?php
$db = new mysqli("localhost", "mohammad_hnauser", "wasim!@#$", "mohammad_hna");

if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$db->set_charset("utf8");
?>