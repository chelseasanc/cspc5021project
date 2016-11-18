<?php
$confs_array = parse_ini_file("confs.ini", true);

$servername = $confs_array['servername'];
$username = $confs_array['username'];
$password = $confs_array['password'];
$dbname = $confs_array['dbname'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
