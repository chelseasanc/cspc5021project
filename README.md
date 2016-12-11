# cspc5021project
Project for Database Systems http://catalog.seattleu.edu/preview_program.php?catoid=28&poid=5553&returnto=2175

##Happy Paths
1. Start at /login.html > Create a new account > Go to myapps (this should be empty right now) > Create a new Application > Enter app info > Enter personal info > Enter app details > Confirm > After confirmation, click "Back to My Apps" > See your new application on the myapps page > Rejoice!
2. Start at /login.html > Enter credentials for previously created account > See all your apps in myapps > Click "View Application" next to an app > Go to confirmation page and see your app > Rejoice!
3. Start at /login.html > Enter bad credentials > Get redirected to a pretty page that asks you to try again > Try again > Rejoice!

##Notes
1. In accordance with our DB design, each user will have one "APPLICANT" record containing their personal info, but multiple "APPLICATION" records. During the application process, if they have applied before, entering new personal info will update the "APPLICANT" table rather than creating a new row. However, each time they apply they create a new "APPLICATION."
2. Each new record in the "APPLICATION" table is added after the "appinfo" page, but before the "confirm" page. This was intentional, since it would make it possible to create applications without submitting them so they could be edited later on. To build this out in the future, the "Submit" button on the "confirm" page might trigger the addition of the application ID to another table tracking submitted applications and their status. 


##Alterations to SQL database (database_init.sql):
- Altered "INSERT" statements for the "MAJOR" table so they inserted values in the right order
- Extended the lenth of "MAJOR_NAME" column in the "MAJOR" table to fit the full names of majors
- Fixed typos in the data for "MAJOR", "SCHOOL", and "DEGREE_TYPE INSERT"
- Removed "GENDER" table and "GENDER ID" column from "APPLICANT" table, added "GENDER" column to "APPLICANT" table

