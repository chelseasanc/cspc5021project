<?php include 'connect_php.php'; ?>
<html>
  <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Additional styling by Chelsea -->
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <title>New Application</title>
  </head>
  <body>
    <h3>New Application</h3>
    <div>
    <form method="POST" action="personalinfo.php">
      <p>
        What type of student are you? <br>
      <?php include 'student_type.php'; ?>
      </p>
      <p>
        Which college are you applying to? <br>
        <?php include 'college.php'; ?>
      </p>
      <p>
        What type of degree are you applying for? <br>
        <?php include 'degree_type.php'; ?>
      </p>
      <p>
        Please select the major you are applying to. <br>
       <?php include 'major.php'; ?>
      </p>
      <p>
        Please select the term you are applying for. <br>
        <?php include 'term.php'; ?>
      </p>
      <br />
      <input type='submit' value='Next' />
    </form>
    </div>
  </body>
<html>
<?php include 'disconnect.php'; ?>
