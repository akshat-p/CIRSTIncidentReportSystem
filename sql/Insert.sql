use akshatpatel;
#FInal Project 
#Akshat, David, and Fabliha

#Populating Tables with information

#Incident Table, from old to most recent
INSERT INTO Incident VALUES 
	(003, 'Phishing', '2018-11-20', 'Open', 201); 
    
INSERT INTO Incident VALUES 
	(002, 'Malware', '2017-05-02', 'Staled', 302);
    
INSERT INTO Incident VALUES
	(001, 'Virus', '2016-01-01', 'Closed', 302);
    

#User Table    
INSERT INTO User VALUES 
	('Scott', 'James', 'Accountant', 'scottjames@gmail.com');
    
INSERT INTO User VALUES
	('Casey', 'Jordan', 'Software Developer', 'jcasey@gmail.com');
    
INSERT INTO User VALUES
	('Adams', 'Katie', 'CEO', 'kadams@hotmail.com');
    
#Comment table, has descriptions 
INSERT INTO comment VALUES
	('Incident has been reported', 003, 'Mark Smith');

INSERT INTO comment VALUES
	('Incident has been staled', 002, 'Jane Doe');
    
INSERT INTO comment VALUES
	('Incident has been resolved', 001, 'Eric Jackson');
    
#User_has_Incident Table
INSERT INTO User_has_Incident VALUES
	('Scott', 003);

INSERT INTO User_has_Incident VALUES
	('Casey', 002);
    
INSERT INTO User_has_Incident VALUES
	('Adams', 001);

#IP_Address Table
INSERT INTO IP_Address VALUES
	('241.120.193.203', 001);
    
INSERT INTO IP_Address VALUES
	('231.423.423.213', 002);
    
INSERT INTO IP_Address VALUES
	('123.323.423.321', 003);
    
#Displaying Tables
SELECT * FROM Incident; 
SELECT * FROM `User`;
SELECT * FROM comment;
SELECT * FROM User_has_Incident;
SELECT * FROM IP_Address; 


SELECT Incident.incidentID, Incident.dateCreated, Incident.typeOfIncident,Incident.incidentState, IP_Address.ipAddress, User.firstName, User.emailAddress,comment.comments
FROM 
Incident JOIN comment ON incident.incidentID = comment.Incident_incidentID
JOIN IP_Address ON incident.incidentID = IP_Address.Incident_incidentID
JOIN user_has_incident ON incident.incidentID = user_has_incident.Incident_incidentID
JOIN user ON user_has_incident.user_lastname = user.lastname;


Update `User`
SET firstName = 'akshat'
Where lastName = 'patel';



CREATE TABLE `admin` (
username varchar(15) not null,
passcode varchar(25) not null,
id int not null auto_increment,

Primary Key (id)
);

INSERT INTO `admin` (username,passcode) VALUES ('ProjectUser','projectpassword');

Select id from 	`admin` where username = 'ProjectUser' and passcode = 'projectpassword';


#Incident,User,comment,IP_Address;
#INNER JOIN comment
#ON comment.Incident_incidentID=comments.Incident_incidentID;
