<?php
  session_start();
  include 'connect_php.php';

  $raceSql = mysqli_prepare($conn, "SELECT RACE_NAME FROM RACE R, APPLICANT A, APPLICANT_RACE AR WHERE A.APPLICANT_ID=AR.APPLICANT_ID AND AR.RACE_CODE=R.RACE_CODE AND A.EMAIL= ? ");
  mysqli_stmt_bind_param($raceSql, 's',  $username = $_SESSION['username']);
  $raceResult = mysqli_stmt_execute($raceSql);
  mysqli_stmt_bind_result($raceSql,$raceName);

  $races = "";

  if ($raceResult){
    while(mysqli_stmt_fetch($raceSql)) {
      $races = $races.$raceName."<br>\n";
    }
  }
  mysqli_stmt_close($raceSql);

  $sql = mysqli_prepare($conn, "SELECT FIRST_NAME,LAST_NAME,PREFERRED_NAME,DOB,PHONE_AREA_CODE,PHONE_LAST_SEVEN,US_CITIZEN,NATIVE_LANGUAGE,GENDER,HISP_LATINO,LINE_1,LINE_2,CITY,STATE_NAME,ZIP_CODE,COUNTRY_NAME,STATUS_NAME,BRANCH_NAME FROM APPLICANT A, ADDRESS AD, MILITARY_STATUS M, MIL_STATUS_TYPE MS, MIL_BRANCH_TYPE MB, STATE S, COUNTRY C WHERE  A.ADDRESS_ID = AD.ADDRESS_ID AND  AD.STATE_ID = S.STATE_ID AND AD.COUNTRY_ID = C.COUNTRY_ID AND A.APPLICANT_ID = M.APPLICANT_ID AND M.STATUS_CODE = MS.STATUS_CODE AND M.BRANCH_CODE = MB.BRANCH_CODE AND A.EMAIL = ? ");
  mysqli_stmt_bind_param($sql, 's',  $username = $_SESSION['username']);
  $result = mysqli_stmt_execute($sql);
  mysqli_stmt_bind_result($sql,$firstName,$lastName,$preferredName,$dob,$phoneArea,$phoneNumber,$usCitizen,$nativeEng,$gender,$hispanic,$addr1,$addr2,$city,$state,$zip,$country,$milStatus,$milBranch);
  mysqli_stmt_fetch($sql);
  mysqli_stmt_close($sql);

  if ($result) {
      echo "<table class='confirm'>\n";
      echo "<thead> <td colspan='2'> Personal Information </td> </thead>\n";
      echo "<tr>\n";
      echo "<td> First Name: </td> \n";
      echo "<td>" . $firstName . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td> Last Name: </td> \n";
      echo "<td>" . $lastName . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Preferred Name: </td> \n";
      echo "<td>" . $preferredName . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td> Date of Birth: </td> \n";
      echo "<td>" . $dob . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Phone Number: </td> \n";
      echo "<td>(" . $phoneArea . ")" . $phoneNumber . "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td> Are you a US Citizen? </td> \n";
      echo "<td>" . $usCitizen . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Is English your native language? </td> \n";
      echo "<td>" . $nativeEng . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Gender: </td> \n";
      echo "<td>" . $gender . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Race: </td> \n";
      echo "<td>" . $races . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Are you Hispanic/Latino? </td> \n";
      echo "<td>" . $hispanic . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Address Line 1: </td> \n";
      echo "<td>" . $addr1 . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Address Line 2: </td> \n";
      echo "<td>" . $addr2 . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> City: </td> \n";
      echo "<td>" . $city . "</td>\n";
      echo "<tr>\n";
      echo "<td> State: </td> \n";
      echo "<td>" . $state . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Zip Code: </td> \n";
      echo "<td>" . $zip . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Country: </td> \n";
      echo "<td>" . $country . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Military Status: </td> \n";
      echo "<td>" . $milStatus . "</td>\n";
      echo "</tr>";
      echo "<tr>\n";
      echo "<td> Military Branch: </td> \n";
      echo "<td>" . $milBranch . "</td>\n";
      echo "</tr>";
    echo "</table>\n";
  } else {
    echo $_SESSION['username'] . " doesn't have any apps at this time";
  }

  include 'disconnect.php';
?>
