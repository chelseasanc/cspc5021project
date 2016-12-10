<?php
  include 'connect_php.php';

  // Post vars
  // All the app info
  $financial_aid = $_POST['financial_aid'];
  $emp_tuition_assitance = $_POST['emp_tuition_assitance'];
  $other_programs = $_POST['other_programs'];
  $felon_misdemean = $_POST['felon_misdemean'];
  $academic_probation = $_POST['academic_probation'];


  session_start();
  $useremail = $_SESSION['username'];


  //All the session variables stored from the "newapp" page
  $student_type = $_SESSION['student_type'];
  $college = $_SESSION['college'];
  $degree_type = $_SESSION['degree_type'];
  $major = $_SESSION['major'];
  $term = $_SESSION['term'];


  //get applicant ID from the applicant table based off the username

  $row = mysqli_query($conn, "SELECT APPLICANT_ID FROM APPLICANT WHERE EMAIL='".$useremail."';");

  $arr = mysqli_fetch_array($row);

  if (!$arr) {
    echo "no results";
  }

  $applicant_id = $arr[0];

  echo $applicant_id;

  function sqlFail() {
    die("Error creating application, please go back and try again");
  }

  $sql= mysqli_prepare($conn, "INSERT INTO APPLICATION VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

  mysqli_stmt_bind_param($sql, "iiiiiiiiii", $applicant_id, $major, $student_type, $academic_probation, $degree_type, $term, $financial_aid, $emp_tuition_assitance, $other_programs, $felon_misdemean);

  $result = mysqli_stmt_execute($sql);

  if (!$result) {
    sqlFail();
  }

  mysqli_stmt_close($sql);

  header("Location: ./confirm.php");

  include 'disconnect.php';
?>
