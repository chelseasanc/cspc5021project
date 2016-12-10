<?php
  session_start();
  include 'connect_php.php';


  $student_type = mysqli_query($conn, "SELECT S.STUDENT_TYPE_NAME FROM APPLICATION A JOIN APPLICANT APP ON A.APPLICANT_ID = APP.APPLICANT_ID JOIN STUDENT_TYPE ST ON A.STUDENT_TYPE_ID = ST.STUDENT_TYPE_ID JOIN MAJOR M ON M.MAJOR_ID = A.MAJOR_ID JOIN COLLEGE CO ON CO.COLLEGE_ID = M.COLLEGE_ID JOIN DEGREE_TYPE DG ON DG.DEGREE_TYPE_ID = A.DEGREE_TYPE_ID JOIN TERM TM ON TM.TERM_ID = A.TERM_ID WHERE APP.EMAIL = ?");
  echo $_SESSION['username'];
  mysqli_stmt_bind_param($sql, "s", $_SESSION['username']);
  $results = mysqli_stmt_execute($sql);
  mysqli_stmt_bind_result($sql, $appId, $majorId, $studentType, $degreeType, $termQtr, $termYr);

  if ($results) {
    echo "<table>\n";
      while (mysqli_stmt_fetch($sql)) {
        echo "<tr>\n";
        echo "<td>" . $appId . "</td>\n";
        echo "<td>" . $majorId . "</td>\n";
        echo "<td>" . $studentType . "</td>\n";
        echo "<td>" . $degreeType . "</td>\n";
        echo "<td>" . $termQtr . "</td>\n";
        echo "<td>" . $termYr . "</td>\n";
        echo "</tr>\n";
      }
      echo "</tbody>\n";
    echo "</table>\n";
  } else {
    echo $_SESSION['username'] . " doesn't have any apps at this time";
  }


  include 'disconnect.php';
?>
