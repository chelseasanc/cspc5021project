<?php
  include 'connect_php.php';

  session_start();

  $useremail = $_SESSION['username'];


  //get post vars
  $student_type = $_POST['student_type'];
  $college = $_POST['college'];
  $degree_type = $_POST['degree_type'];
  $major = $_POST['major'];
  $term = $_POST['term'];

   echo  $major;

  //Store post vars in session for later use on the "appinfo" page
  $_SESSION['student_type'] = $student_type;
  $_SESSION['college'] = $college;
  $_SESSION['degree_type'] = $degree_type;
  $_SESSION['major'] = $major;
  $_SESSION['term'] = $term;




  //header("Location: ./personalinfo.php");

  include 'disconnect.php';
?>
