# CS260_TPC_PortalWelcome to TPC Portal developed for the CS259 project.

Instructions to use this project:

Go to database.php to enter the mysql server details like username, password and database.

Make sure you have all the tables with required attributes as per the report submitted.

Make a google form which will be used to collect files from students which will be stored in google drive. The form contains: 10th Marksheet : Type = Document 12th Marksheet : Type = Document Transcript : Type = Document Resume : Type = Document

Paste this link in edit_profile.php file of student folder.

To configure api for this project visit the following link and follow the procedure: https://support.google.com/googleapi/answer/6158841?hl=en

After setting up api make the following changes in the files:

Go to drive.js file of admin and company folders and paste the api key in API_KEY variable. api key can be generated from credentials section.

Go to documents.php file in admin folder and paste the respective folder ids in folderId variables. The folderId will be taken from the drive of the host google account.

Go to resume.php file in company folder and paste the folder id of resume folder from the drive.

Note: All api and drive related stuff should be performed on same google account.
