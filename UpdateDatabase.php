<?php

        $host = "localhost";
        $user = "akshatpatel";
        $pw = "";
        $database = "akshatpatel";

        $db = new mysqli($host, $user, $pw, $database);
        if ($db->connect_errno) {
                echo "Connect failed: ". $db->connect_error;
                exit();}
//Incident Table
        if(isset($_REQUEST['incidentID'])){    $incidentID=$_REQUEST['incidentID'];  }
        if(isset($_REQUEST['typeOfIncident'])){    $typeOfIncident=$_REQUEST['typeOfIncident']; }
        if(isset($_REQUEST['dateCreated'])){    $dateCreated=$_REQUEST['dateCreated'];  }
        if(isset($_REQUEST['incidentState'])){    $incidentState=$_REQUEST['IncidentState']; }
        if(isset($_REQUEST['User_incidentID'])){    $User_incidentID=$_REQUEST['User_incidentID'];  }


        if(isset($_REQUEST['incidentID'])){
        $sql = "UPDATE `Incident` (incidentID,typeOfIncident,dateCreated,incidentState,User_incidentID)
                VALUES ('$incidentID', '$typeOfIncident', '$dateCreated', '$incidentState', '$User_incidentID');";
       if(mysqli_query($db, $sql)){
       echo "Record was updated successfully.";
      } else {
        echo "ERROR: Could not able to execute $sql. "
                            . mysqli_error($db);
     }
    }

//User Table
        if(isset($_REQUEST['lastName'])){    $lastName=$_REQUEST['lastName'];  }
        if(isset($_REQUEST['firstName'])){    $firstName=$_REQUEST['firstName']; }
        if(isset($_REQUEST['jobTitle'])){    $jobTitle=$_REQUEST['jibTitle'];  }
        if(isset($_REQUEST['emailAddress'])){    $emailAddress=$_REQUEST['emailAddress']; }

        if(isset($_REQUEST['lastName'])){
        $sql = "UPDATE `User` (lastName,firstName,jobTitle,emailAddress)
                VALUES ('$lastName', '$firstName', '$jobTitle', '$emailAddress');";
       if(mysqli_query($db, $sql)){
       echo "Record was updated successfully.";
      } else {
        echo "ERROR: Could not able to execute $sql. "
                            . mysqli_error($db);
     }

   }
        //Comment table
        if(isset($_REQUEST['comments'])){    $comments=$_REQUEST['comments'];  }
        if(isset($_REQUEST['Incident_incidentID'])){    $Incident_incidentID=$_REQUEST['Incident_incidentID']; }
        if(isset($_REQUEST['author'])){    $author=$_REQUEST['author'];  }

        //Sql statements to update entries in the comments table
        if(isset($_REQUEST['incidentID'])){
        $sql = "UPDATE `comment` (comments,Incident_incidentID,author)
                VALUES ('$comments', '$Incident_incidentID', '$author');";
       if(mysqli_query($db, $sql)){
       echo "Record was updated successfully.";
      } else {
        echo "ERROR: Could not able to execute $sql. "
                            . mysqli_error($db);
     }
    }

        //User_has_Incident Table
        if (isset($_REQUEST['User_lastName'])){ $User_lastName=$_REQUEST['User_lastName']; }
        if (isset($_REQUEST['Incident_incidentID'])){ $Incident_incidentID=$_REQUEST['Incident_incidentID']; }

        //SQL Statment to update entires in the User_has_Incident Table
        if(isset($_REQUEST['Incident_incidentID']))
        {
                $sql= "UPDATE `User_has_Incident`(User_lastName, Incident_incidentID)
                VALUES ('$User_lastName', '$Incident_incidentID');";
                if($db->query($sql) == TRUE)
                {
                        echo "Record was updated successfully";
                }
                else
                {
                        echo "Error: " . $sql . "<br>" . $db->error;
                }
        }

        //IP_Address Table
        if (isset($_REQUEST['ipAddress'])){ $ipAddress=$_REQUEST['ipAddress']; }
        if (isset($_REQUEST['Incident_incidentID'])){ $Incident_incidentID=$_REQUEST['Incident_incidentID']; }

        //SQL Statement to update entires in the IP_Address Table
        if(isset($_REQUEST['Incident_incidentID']))
        {
                $sql= "UPDATE `IP_Address`(ipAddress, Incident_incidentID)
                VALUES ('$ipAddress', '$Incident_incidentID');";
                if($db->query($sql) == TRUE)
                {
                        echo "Record was updated successfully";
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

    mysqli_close($db);
?>
