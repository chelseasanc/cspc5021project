<?php
include 'connect_php.php';
session_start();

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = mysqli_prepare($conn, "SELECT EMAIL, PASSWORD FROM LOGIN WHERE EMAIL = ? and PASSWORD = ?");

$email = $_POST['email'];
mysqli_stmt_bind_param($sql, "ss", $email, MD5($_POST['password']));
mysqli_stmt_execute($sql);
mysqli_stmt_bind_result($sql, $col1, $col2);

$count = 0;

while (mysqli_stmt_fetch($sql)) {
   $count++;
}

if ($count > 0) {
  $_SESSION['username'] = $email;
  header("Location: ./myapps.php");
} else {
    header("Location: ./badlogin.html");
}

mysqli_stmt_close($sql);
include 'disconnect.php';
?>
