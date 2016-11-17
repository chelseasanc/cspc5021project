<?php include 'connect_php.php'; ?>
<html>
<head>
  <title>New Application</title>
</head>
<body>
  <h1>New Application</h1>
  <form method="POST" action="confirm.php">
  <label for='stu_type'>Student Type: </label>
<?php include 'student_type.php'; ?>
  <br />
  <input type='submit' value='Next' />
  </form>
</body>
<html>
<?php include 'disconnect.php'; ?>
