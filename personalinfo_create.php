<?php
  include 'connect_php.php';

  // Post vars
  $firstname = $_POST['first-name'];
  $lastname = $_POST['last-name'];
  $preferredname = $_POST['preferred-name'];
  $birthday = $_POST['birthday'];
  $phone = $_POST['phone'];
  $street1 = $_POST['street1'];
  $street2 = $_POST['street2'];
  $city = $_POST['city'];
  $zip = $_POST['zip'];
  $state = $_POST['state_id'];
  $country = $_POST['country_id'];

  $addressSQL = mysqli_prepare($conn, "INSERT INTO ADDRESS (LINE_1, LINE_2, CITY, STATE_ID, ZIP_CODE, COUNTRY_ID) VALUES (?, ?, ?, ?, ?, ?)");

  mysqli_stmt_bind_param($addressSQL, "ssssss", $street1, $street2, $city, $state, $zip, $country);
  mysqli_stmt_execute($addressSQL);

  include 'disconnect.php';
?>