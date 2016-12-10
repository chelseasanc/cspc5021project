<?php
$confirmedPwd = $_POST['confirmed-password'];
$pwd = $_POST['password'];

if ($confirmedPwd != $pwd) {
  echo "Your passwords do not match!";
  echo "<a href='/create_account.html'>Try again</a>";
} else {
  include 'connect_php.php';

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $sql = mysqli_prepare($conn, "INSERT INTO LOGIN VALUES (?, ?)");

  mysqli_stmt_bind_param($sql, "ss", $_POST['email'], MD5($_POST['password']));
  mysqli_stmt_execute($sql);

  $selectQuery = mysqli_prepare($conn, "SELECT EMAIL, PASSWORD FROM LOGIN WHERE EMAIL = ? and PASSWORD = ?");

  mysqli_stmt_bind_param($selectQuery, "ss", $_POST['email'], MD5($_POST['password']));
  mysqli_stmt_execute($selectQuery);
  mysqli_stmt_bind_result($selectQuery, $col1, $col2);

  $count = 0;

  while (mysqli_stmt_fetch($selectQuery)) {
     $count++;
  }

  if ($count > 0) {
    session_start();
    $_SESSION['username'] = $_POST['email'];
    header("Location: ./myapps.php");
  } else {
    echo "Fail! Account not created.";
  }
  mysqli_stmt_close($sql);

  include 'disconnect.php';
}
?>
