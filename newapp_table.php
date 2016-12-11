<?php
  session_start();
  include 'connect_php.php';

  $application_id = $_SESSION['application_id'];

  $sql =  "SELECT STUDENT_TYPE_NAME, COLLEGE_NAME, DEGREE_TYPE_NAME, QUARTER, YEAR FROM APPLICATION A, STUDENT_TYPE S, MAJOR M, COLLEGE C, DEGREE_TYPE D, TERM T WHERE A.STUDENT_TYPE_ID = S.STUDENT_TYPE_ID AND M.MAJOR_ID = A.MAJOR_ID AND C.COLLEGE_ID = M.COLLEGE_ID AND D.DEGREE_TYPE_ID = A.DEGREE_TYPE_ID AND T.TERM_ID = A.TERM_ID AND A.APP_ID=".$application_id.";";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_row($result);
      echo "<table>\n";
      echo "<thead> <td colspan='2'> Application </td> </thead>\n";
      echo "<tr>\n";
      echo "<td> What type of student are you? </td> \n";
      echo "<td>" . $row[0] . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td> Which college are you applying to? </td> \n";
      echo "<td>" . $row[1] . "</td>\n";
      echo "</tr>";echo "<tr>\n";
      echo "<td> What type of degree are you applying for? </td> \n";
      echo "<td>" . $row[2] . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td> Please select the major you are applying to. </td> \n";
      echo "<td>" . $row[3] . "</td>\n";
      echo "</tr>";echo "<tr>\n";
      echo "<td> Please select the term you are aplying for. </td> \n";
      echo "<td>" . $row[4] . " " . $row[6] . "</td>\n";
      echo "</tr>\n";
    echo "</table>\n";
  } else {
    echo $_SESSION['username'] . " doesn't have any apps at this time";
  }

  include 'disconnect.php';
?>
