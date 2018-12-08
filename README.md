# CIRSTIncidentReportSystem













Akshat Patel, David Ijagbemi, Fabliha Hossain
Database Management Systems
Final Project: Computer Security Incident Response Teams 
Professor Liu




















 ## Introduction
As the number of technological advances that have occurred over the last few years and will occur during the next few years increase, so does the chances for potential computer security event or incidents. Due to this, Computer Security Incident Response Teams (CSIRTs) were created in order to track these incidents and monitor them until they are resolved.Once declared, incidents are added to a database and are assigned a unique identifier. Initial information required are the date it was created, the type of incident, and the status (open, closed, or staled). They are updated with comments, each associated with name of the handlers who wrote it. Incident responders must be able to query the database by incident number and receive a report containing the full history of a given incident. Our project was to implement SQL, HTML, and PHP to create a database and website for this particular concept. 

## Back-End!
![ScreenShot](https://github.com/AKSHAT3272/CIRSTIncidentReportSystem/blob/master/img/ERD.png)
The first thing that we did was create an ERD Model with diagrams on MySQL workbench. This is so we get an initial overview of the database we needed to create. Our first two tables were the Incident and User table. These two tables had a one to many relationship, thereby creating a secondary table called User_has_Incident. This is due to the consideration that the user may be involved in many incidents. The User table included the first and last name, job title, and email address of the user. We then added another table for the comments because for every incident recorded, a description or comments must be given. The last table created was for the IP Address of the device that was associated to the incident. This was also a one to many relationships since incidents could have any number of IP Addresses. Ultimately, in our ERD Model, we had 5 entities that were created.  
	Once that was completed, David and Fabliha worked on the back-end while Akshat worked on the front-end. MySQL Workbench was used to create two SQL scripts. The first script was connected with the ERD Model to create the 5 tables. The second script was used to populate each table with sample data. Three examples were hard-coded into the SQL script for the initial data entry. Later on, once the website was created, the tables were updated with newer incident data using the report form. When the SQL scripts were finished, David and Fabliha coded three different php files and included certain SQL statements in each: insertDatabase.php, which added new entries to the tables, updateDatabase.php, which updated current entries in the table, and deleteDatabase, which removed entries from the tables. Meanwhile, Akshat used HTML to create the site http://compsci.adelphi.edu/~akshatpatel/Index/. Using the compsci server, all necessary html and php files were tested. 

## Front-End
![ScreenShot](https://github.com/AKSHAT3272/CIRSTIncidentReportSystem/blob/master/img/home.JPG)
Once someone when went to the aforementioned link, the website prompted the user for a login and password. For this project, our general username was ProjectUser and our password was projectpassword. ![ScreenShot](https://github.com/AKSHAT3272/CIRSTIncidentReportSystem/blob/master/img/login.png)
Once logged in, the user can see a table that contains the information of the incidents in our database. For instance, there was the incidentID, date created, and even the most recent comments that pertain the that incident. In addition to that, users can use the search bar to look up certain incidents by their ID number. This would shorten the table to show only incidents that have ID’s that include the number given. An example is shown here. 
![ScreenShot](https://github.com/AKSHAT3272/CIRSTIncidentReportSystem/blob/master/img/search.JPG)

![ScreenShot](https://github.com/AKSHAT3272/CIRSTIncidentReportSystem/blob/master/img/create.JPG)
The last thing the user can do is update our current database by adding new incidents into the website directly. To do this, Akshat added a button called “Create New Report”. Clicking on this would pop up a report form that asks the necessary information needed to insert a new incident. 
