<?php
  session_start();
  include 'connect_php.php';

  $application_id = $_SESSION['application_id'];

  $sql =  "SELECT FINANCIAL_AID, EMP_TUITION_ASSISTANCE, OTHER_PROGRAMS, FELON_MISDEMEAN, ACADEMIC_PROBATION FROM APPLICATION WHERE APP_ID=".$application_id.";";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_row($result);
      echo "<table class='confirm'>\n";
      echo "<thead> <td colspan='2'>Application Details </td> </thead>\n";
      echo "<tr>\n";
      echo "<td>Will you be applying for financial aid? </td> \n";
      echo "<td>" . $row[0] . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td>Do you have employer tuition assistance? </td> \n";
      echo "<td>" . $row[1] . "</td>\n";
      echo "</tr>";echo "<tr>\n";
      echo "<td>Are you also applying to other programs? </td> \n";
      echo "<td>" . $row[2] . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td>Have you ever been convicted of a felony or a gross misdemeanor? </td> \n";
      echo "<td>" . $row[3] . "</td>\n";
      echo "</tr>";echo "<tr>\n";
      echo "<td>Have you ever been placed on probation, suspended from, dismissed from, or otherwise sanctioned by (for any period of time) any higher education institution?</td> \n";
      echo "<td>" . $row[4] . "</td>\n";
      echo "</tr>\n";
    echo "</table>\n";
  } else {
    echo $_SESSION['username'] . " doesn't have any apps at this time";
  }

  include 'disconnect.php';
?>
