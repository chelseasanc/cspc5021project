<?php include 'connect_php.php'; ?>
  <html>
    <head>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <title>Personal Info</title>
    </head>
    <body>
      <h1>Enter Your Personal Information</h1>
      <form method="POST" action="appinfo.php">
      <label for='race'>Please mark all that apply: </label>
      <?php include 'race_info.php'; ?>
      <br />
      <label for='military_branch'>Select Military Branch: </label>
      <?php include 'military_info.php'; ?>
      <br />
      <label for='military_status'>Select Military Status: </label>
      <?php include 'military_status_info.php'; ?>
      <br />
      Gender:
      <label>Male
         <input type="radio" name="gender" value="male"/>
      </label>
      <label>Female
         <input type="radio" name="gender" value="female"/>
      </label>
      <br />
      Native English English Speaker
      <label> True
         <input type="radio" name="isEnglish" value="true"/>
      </label>
      <label> False
         <input type="radio" name="isEnglish" value="false"/>
      </label>
      <br />
      Are you a US citizen?
      <label> True
         <input type="radio" name="isUSCitizen" value="true"/>
      </label>
      <label> False
         <input type="radio" name="isUSCitizen" value="false"/>
      </label>
      <br />
      Are you Hispanic/Latino origin?
      <label> True
         <input type="radio" name="isHispanic" value="true"/>
      </label>
      <label> False
         <input type="radio" name="isHispanic" value="false"/>
      </label>
      <br />
      </form>
    </body>
  <html>
<?php include 'disconnect.php'; ?>
