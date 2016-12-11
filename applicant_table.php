<?php
  session_start();
  include 'connect_php.php';

  $username = $_SESSION['username'];
  $raceSql = "SELECT RACE_NAME FROM RACE R, APPLICANT A, APPLICANT_RACE AR WHERE A.APPLICANT_ID=AR.APPLICANT_ID AND AR.RACE_CODE=R.RACE_CODE AND A.EMAIL='".$username."';";

  $raceResult = mysqli_query($conn, $raceSql);

  $races = "";

  if (mysqli_num_rows($raceResult)){
    while($row = mysqli_fetch_row($raceResult)) {
      $races = $races.$row[0]."<br>\n";
    }
  }

  $sql =  "SELECT FIRST_NAME,LAST_NAME,PREFERRED_NAME,DOB,PHONE_AREA_CODE,PHONE_LAST_SEVEN,US_CITIZEN,NATIVE_LANGUAGE,GENDER,HISP_LATINO,LINE_1,LINE_2,CITY,STATE_NAME,ZIP_CODE,COUNTRY_NAME,STATUS_NAME,BRANCH_NAME FROM APPLICANT A, ADDRESS AD, MILITARY_STATUS M, MIL_STATUS_TYPE MS, MIL_BRANCH_TYPE MB, STATE S, COUNTRY C WHERE  A.ADDRESS_ID = AD.ADDRESS_ID AND  AD.STATE_ID = S.STATE_ID AND AD.COUNTRY_ID = C.COUNTRY_ID AND A.APPLICANT_ID = M.APPLICANT_ID AND M.STATUS_CODE = MS.STATUS_CODE AND M.BRANCH_CODE = MB.BRANCH_CODE AND A.EMAIL ='".$username."';";

  $result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_row($result);
      echo "<table class='confirm'>\n";
      echo "<thead> <td colspan='2'> Personal Information </td> </thead>\n";
      echo "<tr>\n";
      echo "<td> First Name: </td> \n";
      echo "<td>" . $row[0] . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td> Last Name: </td> \n";
      echo "<td>" . $row[1] . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Preferred Name: </td> \n";
      echo "<td>" . $row[2] . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td> Date of Birth: </td> \n";
      echo "<td>" . $row[3] . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Phone Number: </td> \n";
      echo "<td>(" . $row[4] . ")" . $row[5] . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td> Are you a US Citizen? </td> \n";
      echo "<td>" . $row[6] . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Is English your native language? </td> \n";
      echo "<td>" . $row[7] . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Gender: </td> \n";
      echo "<td>" . $row[8] . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Race: </td> \n";
      echo "<td>" . $races . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Are you Hispanic/Latino? </td> \n";
      echo "<td>" . $row[9] . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Address Line 1: </td> \n";
      echo "<td>" . $row[10] . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Address Line 2: </td> \n";
      echo "<td>" . $row[11] . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> City: </td> \n";
      echo "<td>" . $row[12] . "</td>\n";
      echo "<tr>\n";
      echo "<td> State: </td> \n";
      echo "<td>" . $row[13] . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Zip Code: </td> \n";
      echo "<td>" . $row[14] . "</td>\n";
      echo "</tr>";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Country: </td> \n";
      echo "<td>" . $row[15] . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Military Status: </td> \n";
      echo "<td>" . $row[16] . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Military Branch: </td> \n";
      echo "<td>" . $row[17] . "</td>\n";
      echo "</tr>";
    echo "</table>\n";
  } else {
    echo $_SESSION['username'] . " doesn't have any apps at this time";
  }

  include 'disconnect.php';
?>
