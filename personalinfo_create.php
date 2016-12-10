<?php
  include 'connect_php.php';
  // Post vars
  // Applicant info
  $firstname = $_POST['first-name'];
  $lastname = $_POST['last-name'];
  $preferredname = $_POST['preferred-name'];
  $birthday = $_POST['birthday'];
  $phoneArea = $_POST['phone-area'];
  $phoneSeven = $_POST['phone-last-seven'];

  // Address info
  $street1 = $_POST['street1'];
  $street2 = $_POST['street2'];
  $city = $_POST['city'];
  $zip = $_POST['zip'];
  $state = $_POST['state_id'];
  $country = $_POST['country_id'];

  // Other app info
  $isUSCitizen = $_POST['isUSCitizen'] == 'true';
  $isEnglish = $_POST['isEnglish'] == 'true';
  $raceInfo = $_POST['race'];
  $gender = $_POST['gender'] == 'female';
  $militaryBranchInfo = $_POST['militaryBranchInfo'];
  $militaryStatus = $_POST['militaryStatus'];
  $isHispanic = $_POST['isHispanic'] == 'true';

  session_start();
  $useremail = $_SESSION['username'];

  function sqlFail() {
    die("Error creating application, please go back and try again");
  }

  $addressSQL = mysqli_prepare($conn, "INSERT INTO ADDRESS (LINE_1, LINE_2, CITY, STATE_ID, ZIP_CODE, COUNTRY_ID) VALUES (?, ?, ?, ?, ?, ?);");

  mysqli_stmt_bind_param($addressSQL, "ssssss", $street1, $street2, $city, $state, $zip, $country);
  $addressCreated = mysqli_stmt_execute($addressSQL);
  $createdId = mysqli_insert_id($conn);

  if (!$addressCreated) {
    sqlFail();
  }

  mysqli_stmt_close($addressSQL);

  include 'disconnect.php';
  include 'connect_php.php';

  $applicantInsert = mysqli_prepare($conn, "INSERT INTO APPLICANT (EMAIL, ADDRESS_ID, FIRST_NAME, LAST_NAME, PREFERRED_NAME, DOB, PHONE_AREA_CODE, PHONE_LAST_SEVEN, US_CITIZEN, NATIVE_LANGUAGE, GENDER_ID, HISP_LATINO) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

  mysqli_stmt_bind_param($applicantInsert, "sissssssssss", $useremail, $createdId, $firstname, $lastname, $preferredname, $birthday, $phoneArea, $phoneSeven, $isUSCitizen, $isEnglish, $gender, $isHispanic);

  $applicantCreated = mysqli_stmt_execute($applicantInsert);
  $createdId = mysqli_insert_id($conn);

  mysqli_stmt_close($applicantInsert);
  if (!$addressCreated) {
    sqlFail();
  }

  include 'disconnect.php';
  include 'connect_php.php';

  foreach ($_POST['race'] as $race) {
    $raceInsert = mysqli_prepare($conn, "INSERT INTO APPLICANT_RACE VALUES (?, ?);");

    mysqli_stmt_bind_param($raceInsert, "ii", $createdId, $race);
    $raceCreated = mysqli_stmt_execute($raceInsert);

    if (!$raceCreated) {
      sqlFail();
    }

    mysqli_stmt_close($raceInsert);
  }

  include 'disconnect.php';
  include 'connect_php.php';

  $militaryStatusInsert = mysqli_prepare($conn, "INSERT INTO MILITARY_STATUS VALUES (?, ?, ?);");

  mysqli_stmt_bind_param($militaryStatusInsert, "iii", $createdId, $militaryStatus, $militaryBranchInfo);
  $milStatusCreated = mysqli_stmt_execute($militaryStatusInsert);

  if (!$milStatusCreated) {
    sqlFail();
  }

  mysqli_stmt_close($militaryStatusInsert);

  if ($applicantCreated) {
    header("Location: /appinfo.php");
  }

  include 'disconnect.php';
?>