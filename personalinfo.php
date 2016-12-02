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
      <form method="POST" action="appinfo.php">
        <label for='first-name'>First Name</label>
        <input type="text" name="first-name"/>
        <br />
        <label for='last-name'>Last Name</label>
        <input type="text" name="last-name"/>
        <br />
        <label for='preferred-name'>Preferred Name</label>
        <input type="text" name="preferred-name"/>
        <br />
        <label for='birthday'>Date of Birth</label>
        <input type="date" name="birthday"/>
        <br />
        <label for='phone'>Preferred Phone</label>
        <input type="phone" name="phone"/>
        <br />
        <div class="form-group"> <!-- Street 1 -->
          <label for="street1_id" class="control-label">Street Address 1</label>
          <input type="text" class="form-control" id="street1_id" name="street1" placeholder="Street address, P.O. box, company name, c/o">
        </div>

        <div class="form-group"> <!-- Street 2 -->
          <label for="street2_id" class="control-label">Street Address 2</label>
          <input type="text" class="form-control" id="street2_id" name="street2" placeholder="Apartment, suite, unit, building, floor, etc.">
        </div>

        <div class="form-group"> <!-- City-->
          <label for="city_id" class="control-label">City</label>
          <input type="text" class="form-control" id="city_id" name="city" placeholder="Smallville">
        </div>

        <div class="form-group"> <!-- State Button -->
          <label for="state_id" class="control-label">State</label>
          <select class="form-control" id="state_id">
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District Of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
          </select>
        </div>

        <div class="form-group"> <!-- Zip Code-->
          <label for="zip_id" class="control-label">Zip Code</label>
          <input type="text" class="form-control" id="zip_id" name="zip" placeholder="#####">
        </div>
        <div class="form-group"> <!-- Zip Code-->
          <label for="country_id" class="control-label">Country</label>
          <input type="text" class="form-control" id="country_id" name="country" placeholder="##">
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
