<?php include 'connect_php.php';?>
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

      <link rel="stylesheet" href="style.css">

      <title>Personal Info</title>
    </head>
    <body>
      <h3>Enter your personal information.</h3>
      <div class ="page-body">
      <form method="POST" action="personalinfo_create.php">
        <p>
          <label for='first-name'>First Name:</label><br>
          <input type="text" name="first-name" required/>
        </p>
        <p>
          <label for='last-name'>Last Name:</label><br>
          <input type="text" name="last-name" required/>
        </p>
        <p>
          <label for='preferred-name'>Preferred Name:</label><br>
          <input type="text" name="preferred-name"/>
        </p>
        <p>
          <label for='birthday'>Date of Birth:</label><br>
          <input type="date" name="birthday" required/>
        </p>
        <p>
          <label for='phone'>Preferred Phone Area Code:</label><br>
          <input type="phone" name="phone-area" required/>
        </p>
        <p>
          <label for='phone'>Preferred Phone Last Seven Digits:</label><br>
          <input type="phone" name="phone-last-seven" required/>
        </p>
        <p>
          <label for="street1_id">Street Address 1:</label><br>
          <input type="text" id="street1_id" name="street1" placeholder="Street address, P.O. box, company name, c/o" required>
        </p>
        <p>
          <label for="street2_id">Street Address 2:</label><br>
          <input type="text" id="street2_id" name="street2" placeholder="Apartment, suite, unit, building, floor, etc.">
        </p>
        <p>
          <label for="city_id">City:</label><br>
          <input type="text" id="city_id" name="city" placeholder="Smallville" required="">
        </p>
        <p>
          <label for="state_id">State:</label><br>
          <?php include 'state_info.php'; ?>
        </p>
        <p>
          <label for="zip_id">Zip Code:</label><br>
          <input type="text" id="zip_id" name="zip" placeholder="#####" required>
        </p>
        <p>
          <label for="country_id">Country:</label><br>
          <?php include 'country_info.php'; ?>
        </p>
        <p>
          Are you a US citizen?<br>
          <label>
             <input type="radio" name="isUSCitizen" value="true"/>
             True
          </label><br>
          <label>
            <input type="radio" name="isUSCitizen" value="false"/>
            False
          </label>
        </p>
        <p>
          Are you a native English speaker?<br>
          <label>
            <input type="radio" name="isEnglish" value="true"/>
            True
          </label><br>
          <label>
             <input type="radio" name="isEnglish" value="false"/>
             False
          </label>
        </p>
        <p>
          Gender: <br>
          <label>
             <input type="radio" name="gender" value="male"/>
             Male
          </label><br>
          <label>
             <input type="radio" name="gender" value="female"/>
             Female
          </label>
        </p>
        <p>
          <label for='military_branch'>Select Military Branch: </label><br>
          <?php include 'military_info.php'; ?>
        </p>
        <p>
          <label for='military_status'>Select Military Status: </label><br>
          <?php include 'military_status_info.php'; ?>
        </p>
        <p>
          <label for='race'>Please mark all that apply: </label><br>
          <?php include 'race_info.php'; ?>
        </p>
        <p>
        Are you Hispanic/Latino?<br>
        <label>
           <input type="radio" name="isHispanic" value="true"/>
           True
        </label><br>
        <label>
           <input type="radio" name="isHispanic" value="false"/>
           False
        </label>
        </p>
        <br />
        <input type='submit' value='Next' />
      </form>
      </div>
    </body>
  <html>
<?php include 'disconnect.php'; ?>
