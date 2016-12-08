# WU-CM333-EVoting

Hello, thank you for looking at our project!

For this project you need:
  1. A server running a web server (we used Apache)
  2. The servers needs to be running MySQL
  3. PHP running on that server
  4. A java installation updated to Java 8
  5. A web broswer
  
***All of these criteria can be met my simply installing XAMPP (or the equivalent on your platform). Installing seperate versions of PHP, MySQL, and Apache would also work, however installing XAMPP only takes a few minutes and can get this project up-and-running quickly.***

**Steps for getting started with voting:**
  1. Make sure that XAMPP (or the equivalent) is installed.
  2. Drag the "voting_system" directory to the "htdocs" folder in the main XAMPP directory.
  3. Change the permissions on the "/voting_system/xml/vote.xml" to the desired permission (we used the command 'chmod 777 vote.xml'). This will allow votes to be added to the vote file.
  4. Start a browser and type "localhost/voting_system" in the address bar.
  5. You can now cast a vote. Open up the "/xml/vote.xml" file to see the votes being added.

**Steps for getting started with registering:**
  1. Start the MySQL database (by clicking the "start" button while mysql is highlighted in the XAMPP screen. Or if you have a  separate install of mysql running, something like: "mysql -h localhost -u root -p" should start it.
  2. The easiest way to play around with database parts(if you are using XAMPP) is to go to "http://localhost/dashboard/" and click on the phpMyAdmin at the top right-hand corner. If you are using a serpate install, simply copy the contents of "/voting_system/db/regdb.sql" into a mysql terminal.
  3. Copy the contents of the "/voting_system/db/regdb.sql" into the sql query section of phpMyAdmin, or import the file under the import tab.
  4. The current "/voting_system/reg_end.php" is where the user and password are set up for the database (line 29). It currently uses the username "root" at "localhost" with no password, which is a default setting for XAMPP.
  5. Go to "localhost/voting_system" in a browser and follow the registration path. The information should be added to the database once the form has been submitted. It can be checked in phpMyAdmin by looking under the registration database on the left-hand column.

**Steps for encrypting the vote.xml file:**

**Steps for decrypting the vote.xml file:**

**Steps for tallying the votes:**

