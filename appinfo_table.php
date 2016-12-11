<?php
  session_start();
  include 'connect_php.php';

  if($_GET['app']) {
    $application_id = $_GET['app'];
  } else {
    $application_id = $_SESSION['application_id'];
  }

  $sql = mysqli_prepare($conn, "SELECT FINANCIAL_AID, EMP_TUITION_ASSISTANCE, OTHER_PROGRAMS, FELON_MISDEMEAN, ACADEMIC_PROBATION FROM APPLICATION WHERE APP_ID= ? ");
  mysqli_stmt_bind_param($sql, 'i', $application_id);
  $results = mysqli_stmt_execute($sql);
  mysqli_stmt_bind_result($sql,$finAid,$empTuition,$otherPrograms,$felonMisdemean,$academicProb);
  mysqli_stmt_fetch($sql);
  mysqli_stmt_close($sql);

  if ($results) {
      echo "<table class='confirm'>\n";
      echo "<thead> <td colspan='2'>Application Details </td> </thead>\n";
      echo "<tr>\n";
      echo "<td>Will you be applying for financial aid? </td> \n";
      echo "<td>" . $finAid . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td>Do you have employer tuition assistance? </td> \n";
      echo "<td>" . $empTuition . "</td>\n";
      echo "</tr>";echo "<tr>\n";
      echo "<td>Are you also applying to other programs? </td> \n";
      echo "<td>" . $otherPrograms . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td>Have you ever been convicted of a felony or a gross misdemeanor? </td> \n";
      echo "<td>" . $felonMisdemean . "</td>\n";
      echo "</tr>";echo "<tr>\n";
      echo "<td>Have you ever been placed on probation, suspended from, dismissed from, or otherwise sanctioned by (for any period of time) any higher education institution?</td> \n";
      echo "<td>" . $academicProb . "</td>\n";
      echo "</tr>\n";
    echo "</table>\n";
  } else {
    echo $_SESSION['username'] . " doesn't have any apps at this time";
  }

  include 'disconnect.php';
?>
