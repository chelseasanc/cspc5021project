<?php
  session_start();
  include 'connect_php.php';
  $sql = mysqli_prepare($conn, "SELECT APP_ID, MAJOR_ID, STUDENT_TYPE_ID, DEGREE_TYPE_ID, TERM_ID FROM APPLICATION A JOIN APPLICANT APP ON A.APPLICANT_ID = APP.APPLICANT_ID WHERE APP.EMAIL = ?");
  echo $_SESSION['username'];
  mysqli_stmt_bind_param($sql, "s", $_SESSION['username']);
  $results = mysqli_stmt_execute($sql);

  $count = 0;

  if (mysqli_stmt_fetch($sql) > 0) {
     while ($row = mysqli_fetch_row($sql)) {
        echo $row[0];
     }
  } else {
      echo $_SESSION['username'] . " doesn't have any apps at this time";
  }


  include 'disconnect.php';
?>