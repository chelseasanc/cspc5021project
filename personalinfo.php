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

      <link rel="stylesheet" href="style.css">

      <title>Personal Info</title>
    </head>
    <body>
      <h3>Enter Your Personal Information</h3>
      <form method="POST" action="personalinfo_create.php">
        <label for='first-name'>First Name</label>
        <input type="text" name="first-name" required/>
        <br />
        <label for='last-name'>Last Name</label>
        <input type="text" name="last-name" required/>
        <br />
        <label for='preferred-name'>Preferred Name</label>
        <input type="text" name="preferred-name"/>
        <br />
        <label for='birthday'>Date of Birth</label>
        <input type="date" name="birthday" required/>
        <br />
        <label for='phone'>Preferred Phone Area Code</label>
        <input type="phone" name="phone-area" required/>
        <br />
        <label for='phone'>Preferred Phone Last Seven Digits</label>
        <input type="phone" name="phone-last-seven" required/>
        <br />
        <div class="form-group"> <!-- Street 1 -->
          <label for="street1_id" class="control-label">Street Address 1</label>
          <input type="text" class="form-control" id="street1_id" name="street1" placeholder="Street address, P.O. box, company name, c/o" required>
        </div>

        <div class="form-group"> <!-- Street 2 -->
          <label for="street2_id" class="control-label">Street Address 2</label>
          <input type="text" class="form-control" id="street2_id" name="street2" placeholder="Apartment, suite, unit, building, floor, etc.">
        </div>

        <div class="form-group"> <!-- City-->
          <label for="city_id" class="control-label">City</label>
          <input type="text" class="form-control" id="city_id" name="city" placeholder="Smallville" required="">
        </div>

        <div class="form-group"> <!-- State Button -->
          <label for="state_id" class="control-label">State</label>
            <?php include 'state_info.php'; ?>
        </div>

        <div class="form-group"> <!-- Zip Code-->
          <label for="zip_id" class="control-label">Zip Code</label>
          <input type="text" class="form-control" id="zip_id" name="zip" placeholder="#####" required>
        </div>
        <div class="form-group"> <!-- Zip Code-->
          <label for="country_id" class="control-label">Country</label>
          <?php include 'country_info.php'; ?>
        </div>
        Are you a US citizen?
        <label> True
           <input type="radio" name="isUSCitizen" value="true"/>
        </label>
        <label> False
           <input type="radio" name="isUSCitizen" value="false"/>
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
        Gender:
        <label>Male
           <input type="radio" name="gender" value="male"/>
        </label>
        <label>Female
           <input type="radio" name="gender" value="female"/>
        </label>
        <br />
        <label for='military_branch'>Select Military Branch: </label>
        <?php include 'military_info.php'; ?>
        <br />
        <label for='military_status'>Select Military Status: </label>
        <?php include 'military_status_info.php'; ?>
        <br />
        <label for='race'>Please mark all that apply: </label>
        <?php include 'race_info.php'; ?>
        <br />
        Are you Hispanic/Latino origin?
        <label> True
           <input type="radio" name="isHispanic" value="true"/>
        </label>
        <label> False
           <input type="radio" name="isHispanic" value="false"/>
        </label>
        <br />
        <input type='submit' value='Next' />
      </form>
    </body>
  <html>
<?php include 'disconnect.php'; ?>
