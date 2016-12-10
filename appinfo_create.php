<?php
  include 'connect_php.php';

  // Post vars
  // All the app info
  $financial_aid = $_POST['financial_aid'] == 'true';
  $emp_tuition_assistance = $_POST['emp_tuition_assistance'] == 'true';
  $other_programs = $_POST['other_programs'] == 'true' ;
  $felon_misdemean = $_POST['felon_misdemean'] == 'true';
  $academic_probation = $_POST['academic_probation'] == 'true';


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

  $applicant_id = $arr[0];

  //echo "applicant_id: ".$applicant_id." major: ".$major." student_type: ".$student_type." academic_probation: ".$academic_probation." degree_type: ".$degree_type." term: ".$term." financial_aid: ".$financial_aid." emp_tuition_assitance: ".$emp_tuition_assistance." other_programs: ".$other_programs." felon_misdemean: ".$felon_misdemean;

  function sqlFail() {
    die("Error creating application, please go back and try again");
  }

  $sql= mysqli_prepare($conn, "INSERT INTO APPLICATION(APPLICANT_ID,MAJOR_ID,STUDENT_TYPE_ID,ACADEMIC_PROBATION,DEGREE_TYPE_ID,TERM_ID,FINANCIAL_AID,EMP_TUITION_ASSISTANCE,OTHER_PROGRAMS,FELON_MISDEMEAN) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

  mysqli_stmt_bind_param($sql, "iiiiiiiiii", $applicant_id, $major, $student_type, $academic_probation, $degree_type, $term, $financial_aid, $emp_tuition_assistance, $other_programs, $felon_misdemean);

  $result = mysqli_stmt_execute($sql);

  if (!$result) {
    echo "no result, curses";
    sqlFail();
  }

  mysqli_stmt_close($sql);

  header("Location: ./confirm.php");

  include 'disconnect.php';
?>
