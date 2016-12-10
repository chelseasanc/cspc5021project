<?php
  include 'connect_php.php';

  session_start();

  //Store these for later use in the session
  $_SESSION['student_type'] = $_POST['student_type'];
  $_SESSION['college'] = $_POST['college'];
  $_SESSION['degree_type'] = $_POST['degree_type'];
  $_SESSION['major'] = $_POST['major'];
  $_SESSION['term'] = $_POST['term'];

  header("Location: ./personalinfo.php");

  include 'disconnect.php';
?>
