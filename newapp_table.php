<?php
  session_start();
  include 'connect_php.php';

 // echo $_SESSION['application_id'];

  $stmt = mysqli_prepare($conn, "SELECT STUDENT_TYPE_NAME, COLLEGE_NAME, DEGREE_TYPE_NAME, MAJOR_NAME, QUARTER, YEAR FROM APPLICATION A, STUDENT_TYPE S, MAJOR M, COLLEGE C, DEGREE_TYPE D, TERM T WHERE A.STUDENT_TYPE_ID = S.STUDENT_TYPE_ID AND M.MAJOR_ID = A.MAJOR_ID AND C.COLLEGE_ID = M.COLLEGE_ID AND D.DEGREE_TYPE_ID = A.DEGREE_TYPE_ID AND T.TERM_ID = A.TERM_ID AND A.APP_ID = ? ");
  mysqli_stmt_bind_param($stmt, 'i', $_SESSION['application_id']);
  $result = mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt,$studentType,$collegeName,$degreeType,$majorName,$quarter,$year);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);

  if ($result) {
      echo "<table class='confirm'>\n";
      echo "<thead> <td colspan='2'> Application </td> </thead>\n";
      echo "<tr>\n";
      echo "<td> What type of student are you? </td> \n";
      echo "<td>" . $studentType . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td> Which college are you applying to? </td> \n";
      echo "<td>" . $collegeName . "</td>\n";
      echo "</tr>"
      ;echo "<tr>\n";
      echo "<td> What type of degree are you applying for? </td> \n";
      echo "<td>" . $degreeType . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td> Please select the major you are applying to. </td> \n";
      echo "<td>" . $majorName. "</td>\n";
      echo "</tr>";echo "<tr>\n";
      echo "<td> Please select the term you are aplying for. </td> \n";
      echo "<td>" . $quarter . " " . $year . "</td>\n";
      echo "</tr>\n";
    echo "</table>\n";
  } else {
    echo $_SESSION['username'] . " doesn't have any apps at this time";
  }


  include 'disconnect.php';
?>
