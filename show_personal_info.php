<?php
  session_start();
  include 'connect_php.php';
  // $sql = mysqli_prepare($conn, "SELECT APP_ID, ST.STUDENT_TYPE_NAME, CO.COLLEGE_NAME, DG.DEGREE_TYPE_NAME, TM.QUARTER, TM.YEAR FROM APPLICATION A JOIN APPLICANT APP ON A.APPLICANT_ID = APP.APPLICANT_ID JOIN STUDENT_TYPE ST ON A.STUDENT_TYPE_ID = ST.STUDENT_TYPE_ID JOIN MAJOR M ON M.MAJOR_ID = A.MAJOR_ID JOIN COLLEGE CO ON CO.COLLEGE_ID = M.COLLEGE_ID JOIN DEGREE_TYPE DG ON DG.DEGREE_TYPE_ID = A.DEGREE_TYPE_ID JOIN TERM TM ON TM.TERM_ID = A.TERM_ID WHERE APP.EMAIL = ?");

  $sql = mysqli_prepare($conn, "SELECT AD.ADDRESS_ID, A.APPLICANT_ID, AD.LINE_1, AD.LINE_2, AD.CITY, AD.STATE_ID, AD.ZIP_CODE, AD.COUNTRY_ID, A.FIRST_NAME, A.LAST_NAME, A.PREFERRED_NAME, A.DOB, A.PHONE_AREA_CODE, A.PHONE_LAST_SEVEN, A.US_CITIZEN, A.NATIVE_LANGUAGE, A.GENDER_ID, A.HISP_LATINO, AR.RACE_CODE, MS.STATUS_CODE, MS.BRANCH_CODE FROM APPLICANT A JOIN ADDRESS AD ON A.ADDRESS_ID = AD.ADDRESS_ID JOIN APPLICANT_RACE AR ON AR.APPLICANT_ID = A.APPLICANT_ID JOIN MILITARY_STATUS MS ON MS.APPLICANT_ID = A.APPLICANT_ID  WHERE EMAIL = ?;");


  mysqli_stmt_bind_param($sql, "s", $_SESSION['username']);
  $results = mysqli_stmt_execute($sql);
  mysqli_stmt_bind_result($sql, $addressId, $appId, $addressLn1, $addressLn2, $addressCity, $addressState, $addressZip, $AddressCountry, $firstName, $lastName, $preferredName, $birthday, $PhoneArea, $PhoneLastSeven, $UsCitizen, $NativeLanguage, $genderId, $hispLatino, $raceCode, $militaryStatus, $militaryBranch);
  mysqli_stmt_fetch($sql);

  if ($results) {
    echo "<table>\n";
      echo "<thead>\n";
        echo "<td>App Id</td>\n";
        echo "<td>Student Type</td>\n";
        echo "<td>College</td>\n";
        echo "<td>Degree</td>\n";
        echo "<td>Major</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
        echo "<td>Term</td>\n";
      echo "<thead>\n";
      echo "<tbody>\n";
        echo "<tr>\n";
        echo "<td>" . $appId . "</td>\n";
        echo "<td>" . $addressId . "</td>\n";
        echo "<td>" . $addressLn1 . "</td>\n";
        echo "<td>" . $addressLn2 . "</td>\n";
        echo "<td>" . $addressCity . "</td>\n";
        echo "<td>" . $addressState . "</td>\n";
        echo "<td>" . $addressZip . "</td>\n";
        echo "<td>" . $AddressCountry . "</td>\n";
        echo "<td>" . $firstName . "</td>\n";
        echo "<td>" . $preferredName . "</td>\n";
        echo "<td>" . $birthday . "</td>\n";
        echo "<td>" . $PhoneArea . "</td>\n";
        echo "<td>" . $PhoneLastSeven . "</td>\n";
        echo "<td>" . $UsCitizen . "</td>\n";
        echo "<td>" . $NativeLanguage . "</td>\n";
        echo "<td>" . $genderId . "</td>\n";
        echo "<td>" . $hispLatino . "</td>\n";
        echo "<td>" . $raceCode . "</td>\n";
        echo "<td>" . $militaryStatus . "</td>\n";
        echo "<td>" . $militaryBranch . "</td>\n";
        echo "</tr>\n";
      echo "</tbody>\n";
    echo "</table>\n";
  } else {
    echo $_SESSION['username'] . " doesn't have any apps at this time";
  }


  include 'disconnect.php';
?>