<?php
  //DBMS Project
  //Akshat, David, and Fabliha
  //This php file inserts entries into the database
        //Connecting to Database
        $host = "localhost";
        $user = "akshatpatel";
        $pw = "";
        $database = "akshatpatel";

        $db = new mysqli($host, $user, $pw, $database);
        if($db->connect_errno)
        {
                echo "Connect Failed: ". $db->connect_error;
                exit();
        }
    
    var_dump($_REQUEST);
        //Incident Table
        if (isset($_REQUEST['incidentID'])){ $incidentID=$_REQUEST['incidentID']; }
        if (isset($_REQUEST['typeOfIncident'])){ $typeOfIncident=$_REQUEST['typeOfIncident']; }
        if (isset($_REQUEST['dateCreated'])){ $dateCreated=$_REQUEST['dateCreated']; }
        if (isset($_REQUEST['incidentState'])){ $incidentState=$_REQUEST['incidentState']; }
        if (isset($_REQUEST['User_incidentID'])){ $User_incidentID=$_REQUEST['User_incidentID']; }

        //SQL Statment to insert entires into Incident Table
        if(isset($_REQUEST['incidentID']))
        {
                $sql= "INSERT INTO `Incident`(incidentID, typeOfIncident, dateCreated, incidentState, User_incidentID)
                VALUES ('$incidentID', '$typeOfIncident', '$dateCreated', '$incidentState', '$User_incidentID');";
                if($db->query($sql) == TRUE)
                {
                        echo "New record successfully created";
                    header('Location: http://compsci.adelphi.edu/~akshatpatel/Index/');
                }
                else
                {
                        echo "Error: " . $sql . "<br>" . $db->error;
                }
        }

        //User Table
        if (isset($_REQUEST['lastName'])){ $lastName=$_REQUEST['lastName']; }
        if (isset($_REQUEST['firstName'])){ $firstName=$_REQUEST['firstName']; }
     if (isset($_REQUEST['jobTitle'])){ $jobTitle=$_REQUEST['jobTitle']; }
        if (isset($_REQUEST['emailAddress'])){ $emailAddress=$_REQUEST['emailAddress']; }

        //SQL Statment to insert entires into User Table
        if(isset($_REQUEST['lastName']))
        {
                $sql= "INSERT INTO `User`(lastName, firstName, jobTitle, emailAddress)
                VALUES ('$lastName', '$firstName', '$jobTitle', '$emailAddress');";
                if($db->query($sql) == TRUE)
                {
                        echo "New record successfully created";
                     header('Location: http://compsci.adelphi.edu/~akshatpatel/Index/');
                }
                else
                {
                        echo "Error: " . $sql . "<br>" . $db->error;
                }
        }

        //Comment table
        if (isset($_REQUEST['comments'])){ $comments=$_REQUEST['comments']; }
        if (isset($_REQUEST['Incident_incidentID'])){ $Incident_incidentID=$_REQUEST['Incident_incidentID']; }
        if (isset($_REQUEST['author'])){ $author=$_REQUEST['author']; }

        //SQL Statment to insert entires into comment Table
        if(isset($_REQUEST['incidentID']))
        {
                $sql= "INSERT INTO `comment`(comments, Incident_incidentID, author)
                VALUES ('$comments', '$incidentID', '$author');";
                if($db->query($sql) == TRUE)
                {
                        echo "New record successfully created";
                    header('Location: http://compsci.adelphi.edu/~akshatpatel/Index/');
                }
                else
                {
                        echo "Error: " . $sql . "<br>" . $db->error;
                }
        }

        //User_has_Incident Table
        if (isset($_REQUEST['User_lastName'])){ $User_lastName=$_REQUEST['User_lastName']; }
        if (isset($_REQUEST['Incident_incidentID'])){ $Incident_incidentID=$_REQUEST['Incident_incidentID']; }

        //SQL Statment to insert entires into User_has_Incident Table
        if(isset($_REQUEST['incidentID']))
        {
                $sql= "INSERT INTO `User_has_Incident`(User_lastName, Incident_incidentID)
                VALUES ('$lastName', '$incidentID');";
                if($db->query($sql) == TRUE)
                {
                        echo "New record successfully created";
                    header('Location: http://compsci.adelphi.edu/~akshatpatel/Index/');
                }
                else
                {
                        echo "Error: " . $sql . "<br>" . $db->error;
                }
        }

        //IP_Address Table
        if (isset($_REQUEST['ipAddress'])){ $ipAddress=$_REQUEST['ipAddress']; }
        if (isset($_REQUEST['Incident_incidentID'])){ $Incident_incidentID=$_REQUEST['Incident_incidentID']; }

        //SQL Statment to insert entires into IP_Address Table
        if(isset($_REQUEST['incidentID']))
        {
                $sql= "INSERT INTO `IP_Address`(ipAddress, Incident_incidentID)
                VALUES ('$ipAddress', '$incidentID');";
                if($db->query($sql) == TRUE)
                {
                        echo "New record successfully created";
                    header('Location: http://compsci.adelphi.edu/~akshatpatel/Index/');
                }
                else
                {
                        echo "Error: " . $sql . "<br>" . $db->error;
                }
        }

        $sql = "SELECT * FROM `Incident`;";
        $result = $db->query($sql);

        if(!$result)
        {
                echo "Uh oh..." . $db->error;
        }
        else
        {
                echo "<br>The result has ". $result->num_rows. " rows.";
        }
?>
