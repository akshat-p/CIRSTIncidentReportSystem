<?php
include ('session.php');
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Incident reports</title>


      <link rel="stylesheet" href="css/style.css">


</head>

<body>
<!--  <a class="logo" href="">Logo</a> -->

  <h2> Incident reports </h2>

  <form action="#" method= "post">
  <div>
    <label>ID Search</label><br>
   <input type="text" name="incidentID" id="myInput" onkeyup= "myFunction()" placeholder="IncidentID" >
  </div>
  <!-- <div>
    <label>By Status</label><br>
    <select>
      <option>Select</option>
      <option value="Open">Open</option>
      <option value="InProgress">InProgress</option>
      <option value="AwaitingCallback">AwaitingCallback</option>
      <option value="Closed">Closed</option>
    </select>
  </div> -->

<div>
    <input type="submit" value="Reset">
  </div>
</form>
<button class="button button1" id="popup">Create New Report</button>
  <!--<button class="button"  onclick=" window.location.href = 'create.php';">Create New Report</button> -->
<div style="float:right;display: inline;position: absolute;top: 0;right: 0;">
<form align="right" name="form1" method="post" action="logout.php">
  <label class="button1">
  <input name="submit2" type="submit" id="submit2" value="logout">
  </label>
</form>
</div>

<?php
$con=mysqli_connect("localhost","akshatpatel","","akshatpatel");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT Incident.incidentID, Incident.dateCreated, Incident.typeOfIncident,Incident.incidentState, IP_Address.ipAddress, User.firstName, User.emailAddress,comment.comments
FROM
Incident JOIN comment ON incident.incidentID = comment.Incident_incidentID
JOIN IP_Address ON incident.incidentID = IP_Address.Incident_incidentID
JOIN user_has_incident ON incident.incidentID = user_has_incident.Incident_incidentID
JOIN user ON user_has_incident.user_lastname = user.lastname;");
?>
<form action="" method="post">
<div class="container">
  <table id = "myTable">
    <tr>
      <th>incidentID</th>
      <th>DateCreated</th>
      <th>IncidentType</th>
      <th>Status</th>
      <th>UserIPAddress</th>
      <th>Name</th>
      <th>Email</th>
      <th> Comments </th>
     </tr>
<!--    <tr>
      <td>0001</td>
      <td>11/29/2018</td>
      <td>Phishing</td>
      <td>InProgress</td>
      <td>192.168.1.1</td>
      <td>Elliot Anderson</td>
      <td>elliot@example.com</td>
    <td>User recieved a Phishing Email</td>
    </tr> -->

<?php
               while ($row = mysqli_fetch_assoc($result)) {
                     echo "<tr>";
                     echo "<td>".$row['incidentID']."</td>";
                     echo "<td>".$row['dateCreated']."</td>";
                     echo "<td>".$row['typeOfIncident']."</td>";
                     echo "<td>".$row['incidentState']."</td>";
                     echo "<td>".$row['ipAddress']."</td>";
                     echo "<td>".$row['firstName']."</td>";
                     echo "<td>".$row['emailAddress']."</td>";
                      echo "<td>".$row['comments']."</td>";
                     echo "</tr>";

}


   ?>


  </table>
</form>
</div>



  <div class="popup-window away out" id="popupwindow">
    <div class="popup-page">
       <button class="button button2" id="close">Close popup</button>
<form action="insertDatabase.php" method="get" id="form" class="topBefore">

  <h1> Create new Report </h1>


 <input name="incidentID" type="text" placeholder="INCIDENT ID">

		  <input name="firstName" type="text" placeholder="FIRSTNAME">
      <input name="lastName" type="text" placeholder="LASTNAME">
		  <input name="emailAddress" type="text" placeholder="E-MAIL">
      <input name="jobTitle" type="text" placeholder="JobTitle">
      <input name="typeOfIncident" type="text" placeholder="Incident Type">
      <input name="ipAddress" type="text" placeholder="IPAddress">
      <input name="dateCreated" type="text" placeholder="Today's Date (yyyy-mm-dd)">
      <input name="User_incidentID" type="text" placeholder="UserID">
        <input name="author" type="text" placeholder="Worker Name">
		  <textarea name="comments" type="text" placeholder="Comments"></textarea>
      <br><br>
      <div>
      <select name="incidentState">
       <optgroup label = "Status">
          <option value="Open">Open</option>
          <option value="InProgress">InProgress</option>
          <option value="AwaitingCallback">AwaitingCallback</option>
          <option value="Closed">Closed</option>
        </select>
      </div>
        <br><br>
  <input id="submit" type="submit" value="SAVE">

</form>
</div>
</div> 

 <script>
// Find buttons & page
let popbutton = document.getElementById('popup');
let awaybutton = document.getElementById('close');
let popwindow = document.getElementById('popupwindow');

// Functions
let toggle = function() {
  popwindow.classList.toggle('pop-up');
  popwindow.classList.toggle('away');
  setTimeout(function(){
    popwindow.classList.toggle('out');
  },250);
}
// Event listeners
popbutton.addEventListener('click', toggle);
awaybutton.addEventListener('click', toggle);
</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>
