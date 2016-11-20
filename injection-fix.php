<?php
$servername = "cssql.seattleu.edu";
$username = "***";
$password = "***";
$dbname = "***";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($conn, $_POST["username"]);
$pwd = $_POST["password"];
$sql = "SELECT * FROM user_md5 WHERE user_name = '$username' and password = MD5('$pwd')";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   echo "welcome " . $username;
} else {
    echo "log in fail!";
}

mysqli_free_result($result);
mysqli_close($conn);
?> 
