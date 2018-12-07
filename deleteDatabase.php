<?php
//DBMS Project
//Akshat, David, and Fabliha
//This php file deletes entries from the database
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

        //Incident Table
        if (isset($_REQUEST['incidentID'])){ $incidentID=$_REQUEST['incidentID']; }
        if (isset($_REQUEST['typeOfIncident'])){ $typeOfIncident=$_REQUEST['typeOfIncident']; }
        if (isset($_REQUEST['dateCreated'])){ $dateCreated=$_REQUEST['dateCreated']; }
        if (isset($_REQUEST['incidentState'])){ $incidentState=$_REQUEST['incidentState']; }
        if (isset($_REQUEST['User_incidentID'])){ $User_incidentID=$_REQUEST['User_incidentID']; }

        //SQL Statement to delete entries from Incident Table
        if(isset($_REQUEST['incidentID']))
        {
          $sql= "DELETE FROM `Incident` WHERE $incidentID = incidentID;";
          if($db->query($sql) == TRUE)
          {
                echo "Record was successfully deleted";
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

        //SQL Statement to delete entries from User Table
        if(isset($_REQUEST['lastName']))
        {
                $sql= "DELETE FROM `User` WHERE $lastName = lastName;";
                if($db->query($sql) == TRUE)
                {
                        echo "Record was successfully deleted";
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

        //SQL Statement to delete entries from Comment Table
        if(isset($_REQUEST['Incident_incidentID']))
        {
                $sql= "DELETE FROM `comment` WHERE $Incident_incidentID = Incident_incidentID;";
                if($db->query($sql) == TRUE)
                {
                        echo "Record was successfully deleted";
                }
                else
                {
                        echo "Error: " . $sql . "<br>" . $db->error;
                }
        }

        //User_has_Incident Table
        if (isset($_REQUEST['User_lastName'])){ $User_lastName=$_REQUEST['User_lastName']; }
        if (isset($_REQUEST['Incident_incidentID'])){ $Incident_incidentID=$_REQUEST['Incident_incidentID']; }

        //SQL Statement to delete entries from User_has_Incident Table
        if(isset($_REQUEST['Incident_incidentID']))
        {
                $sql= "DELETE FROM `User_has_Incident` WHERE $Incident_incidentID = Incident_incidentID;";
                if($db->query($sql) == TRUE)
                {
                        echo "Record was successfully deleted";
                }
                else
                {
                        echo "Error: " . $sql . "<br>" . $db->error;
                }
        }

        //IP_Address Table
        if (isset($_REQUEST['ipAddress'])){ $ipAddress=$_REQUEST['ipAddress']; }
        if (isset($_REQUEST['Incident_incidentID'])){ $Incident_incidentID=$_REQUEST['Incident_incidentID']; }

        //SQL Statement to delete entries from IP_Address Table
        if(isset($_REQUEST['Incident_incidentID']))
        {
                $sql= "DELETE FROM `IP_Address` WHERE $Incident_incidentID = Incident_incidentID;";
                if($db->query($sql) == TRUE)
                {
                        echo "Record was successfully deleted";
                }
                else
                {
                        echo "Error: " . $sql . "<br>" . $db->error;
                }
        }
?>
