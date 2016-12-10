
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

      <title>Application Info</title>

    </head>
    <body>
      <h3>Please provide some more information about your application.</h3>
      <div>
        <form method="POST" action="appinfo_create.php">
          <p>Will you be applying for financial aid? <br>
            <label>
              <input type="radio" name="financial_aid" value="Yes" required/> Yes
            </label><br>
            <label>
              <input type="radio" name="financial_aid" value="No"/> No
            </label>
          </p>
          <p>Do you have employer tuition assistance?<br>
            <label>
              <input type="radio" name="emp_tuition_assistance" value="Yes" required/>
               Yes
            </label><br>
            <label>
              <input type="radio" name="emp_tuition_assistance" value="No"/> No
            </label>
          </p>
          <p>
            Are you also applying to other programs?<br>
            <label>
              <input type="radio" name="other_programs" value="Yes" required/> Yes
            </label><br>
            <label>
              <input type="radio" name="other_programs" value="No"/> No
            </label>
          </p>
          <p>
            Have you ever been convicted of a felony or a gross misdemeanor?<br>
            <label><input type="radio" name="felon_misdemean" value="Yes" required/> Yes </label><br>
            <label><input type="radio" name="felon_misdemean" value="No"/> No </label>
            <br />
            A conviction will not necessarily bar admission but will require additional documentation prior to a decision. You will be contacted shortly via email with instructions on reporting the nature of your conviction.
          </p>
          <p>
            Have you ever been placed on probation, suspended from, dismissed from, or otherwise sanctioned by (for any period of time) any higher education institution?<br>
            <label><input type="radio" name="academic_probation" value="Yes" required/> Yes </label><br>
            <label><input type="radio" name="academic_probation" value="No"/> No </label>
          </p>
          <input type='submit' value='Next' />
        </form>
      </div>
    </body>
  <html>
