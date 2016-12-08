<?php
include 'connect_php.php';

// Create connection
$conn = mysqli_connect($servername, $myusername, $mypassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = mysqli_prepare($conn, "SELECT EMAIL, PASSWORD FROM LOGIN WHERE EMAIL = ? and PASSWORD = ?");

mysqli_stmt_bind_param($sql, "ss", $_POST['email'], MD5($_POST['password']));
mysqli_stmt_execute($sql);
mysqli_stmt_bind_result($sql, $col1, $col2);

$count = 0;

while (mysqli_stmt_fetch($sql)) {
   $count++;
}

if ($count > 0) {
  global $useremail;
  $useremail = $_POST['email'];
  header("Location: /myapps.html");
} else {
    echo "log in fail!";
}

mysqli_stmt_close($sql);
include 'disconnect.php';
?>
