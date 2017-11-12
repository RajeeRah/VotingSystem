Tasks i have completed:
1. installing Apache and mySql Server on my Mac Book -> 1h
2. Modeling and configuration Project -> 1h
3. Implementation - Controller and Model 1h
4. Implementation - View, Exception and CSS 1h
5. Dokumentation and deploying-> 45min
9. Troubleshooting and Bug-Fix -> 1h
10. Adding Region specific Function and displaying the result -> 1h

Tools and Installation:
* User Server: Apache
* PHP version: 5.6
* mySql version 5.6

- the attached zip File should be extracted in Root folder (exp. htdocs)
- create a new Database called TestDB  / username:root, password:root (or change the DB configuration according to your wish, this file is located ‚app/model/VotingsService.php‘)
- database folder contains all necessary tables for this application
- URL to run the application http://localhost:8888/app/index.php
 
How does the Application works:
- I implemented two pages as Requested -> the Informations are stored in DB
- The first page shows current Voting in % and has a confirmation Button to navigate to Voting section
- if the User has Voted, it shows a message and the Confirmation Button is inactive 
- the Second page is the formular - the User can give his Vote and submit it
- by Success execution, it will be redirected to the start page and the current Data is displayed
- to Test with a new user, please change the user_Id in init.php file - the file can be found in root folder (app) 
- region can be changed in init.php file too
