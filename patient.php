<html>
<head>
<style>
h1 {text-align: center;}
p {text-align: center;}
</style>
</head>
<body>

<h1>Patient page</h1>
<div align = 'center'>

<?php
$message = "This is the Patient's page. Administrator ID is ".$_COOKIE["employeeID"];
echo $message;
$host = "localhost";
$username = "id18047674_group41";
$password = "CPSC471@Group41";
$dbname = "id18047674_hospitalpharmacydatabase";

$con = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno($con)) {
        echo "Failed to connect";
}

$message1 = "<h3 style='text-align:center'>Hospitalized Patients</h3>";
echo $message1;
echo "<div align = 'center'>
<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Health Care Number</th>
<th>Primary Nurse First Name</th>
<th>Primary Nurse ID</th>
<th>Medical Unit</th>
<th>Bed Number</th>
</tr>";
$sql1 = "SELECT * from Patient Join Bed where OccupyingPatientId = HealthcareNumber";
$result1 = mysqli_query($con, $sql1);
while ($row = mysqli_fetch_array($result1)) {
        echo "<tr>";
        echo "<td>" . $row['FName'] . "</td>";
        echo "<td>" . $row['LName'] . "</td>";
        echo "<td>" . $row['HealthcareNumber'] . "</td>";
        echo "<td>" . $row['PrimaryNurseId'] . "</td>";
        echo "<td>" . $row['SecondaryNurseId'] . "</td>";
        echo "<td>" . $row['MedUnitNumber'] . "</td>";
        echo "<td>" . $row['Number'] . "</td>";
        echo "</tr>";
}
echo "</table>
</div>"; 

$message1 = "<h3 style='text-align:center'>Patients Not Hospitalized</h3>";
echo $message1;
echo "<div align = 'center'>
<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Health Care Number</th>
<th>Primary Nurse First Name</th>
<th>Primary Nurse ID</th>
</tr>";
$sql1 = "SELECT * FROM Patient AS p LEFT JOIN Bed AS b ON b.OccupyingPatientId = p.HealthcareNumber WHERE b.OccupyingPatientId IS NULL";

$result1 = mysqli_query($con, $sql1);
while ($row = mysqli_fetch_array($result1)) {
        echo "<tr>";
        echo "<td>" . $row['FName'] . "</td>";
        echo "<td>" . $row['LName'] . "</td>";
        echo "<td>" . $row['HealthcareNumber'] . "</td>";
        echo "<td>" . $row['PrimaryNurseId'] . "</td>";
        echo "<td>" . $row['SecondaryNurseId'] . "</td>";
        echo "</tr>";
}
echo "</table>
</div>";

$message2 = "<h3 style='text-align:center'>All Beds Available</h3>";
echo $message2;


echo "<div align = 'center' style='display: inline-block'>
<p style='text-align:center'>Unit 1</p> 
<table border='1' >
<tr>
<th>Bed Number</th>
</tr>";
$sql = "SELECT * FROM Bed WHERE OccupyingPatientId IS NULL AND MedUnitNumber = '1'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['Number'] . "</td>";
              echo "</tr>";
}
echo "</table>
</div>";   

echo "<div align = 'center' style='display: inline-block'>
<p style='text-align:center'>Unit 2</p> 
<table border='1' >
<tr>
<th>Bed Number</th>
</tr>";
$sql = "SELECT * FROM Bed WHERE OccupyingPatientId IS NULL AND MedUnitNumber = '2'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['Number'] . "</td>";
              echo "</tr>";
}
echo "</table>
</div>";

echo "<div align = 'center' style='display: inline-block'>
<p style='text-align:center'>Unit 3</p> 
<table border='1' >
<tr>
<th>Bed Number</th>
</tr>";
$sql = "SELECT * FROM Bed WHERE OccupyingPatientId IS NULL AND MedUnitNumber = '3'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['Number'] . "</td>";
              echo "</tr>";
}
echo "</table>
</div>";

echo "<div align = 'center' style='display: inline-block'>
<p style='text-align:center'>Unit 4</p> 
<table border='1' >
<tr>
<th>Bed Number</th>
</tr>";
$sql = "SELECT * FROM Bed WHERE OccupyingPatientId IS NULL AND MedUnitNumber = '4'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['Number'] . "</td>";
              echo "</tr>";
}
echo "</table>
</div>";

echo "<div align = 'center' style='display: inline-block'>
<p style='text-align:center'>Unit 5</p> 
<table border='1' >
<tr>
<th>Bed Number</th>
</tr>";
$sql = "SELECT * FROM Bed WHERE OccupyingPatientId IS NULL AND MedUnitNumber = '5'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['Number'] . "</td>";
              echo "</tr>";
}
echo "</table>
</div>";

?>

<br><br>
<a href="assignNurse.php">
       <button>View Patients Infromation by Assignment</button>
</a>
<br><br>
<p><u> Add New Patient  </u></p>
<form method="post" action = "addPatient.php">
       <pre>Patient Health Care Number: <input type="text"
       name = 'HCN' placeholder="health care Required"> 
       </pre>
       <pre>Patient Name: <input type="text"name = 'Fname' placeholder="First Name Required"> <input type="text"name = 'Lname' placeholder="Last Name Required">
       </pre>
       <p>Hospital Specific</p>
       <pre>Primary Nurse ID: <input type="number"
       name = 'PNID' placeholder="Optional">
       </pre>
       <pre>Secondary Nurse ID: <input type="number"
       name = 'SNID' placeholder="Optional">
       </pre>
       <pre>Medical Unit: <input type="number"
       name = 'MU' placeholder="Required">
       </pre>
       <pre>Bed Number: <input type="number"
       name = 'BID' placeholder="Required">
       </pre>


       <input type="submit" value="Add">

</form>
<br>
<p><u> Remove Patient </u></p>
<form method="post" action = "removePatient.php">
       <pre>Patient Health Care Number: <input type="text"
       name = 'HCN' placeholder="health care number"> 
       </pre>
       <input type="submit" value="Remove">
</form>
<br>
<p><u>Edit Existing Patient</u></p>
<form method="post" action = "editPatient.php">
       <pre>Patient Health Care Number: <input type="text"
       name = 'HCN' placeholder="REQUIRED"> 
       </pre>
       <p> Fields to edit</p>
       <pre>Patient Name: 
       <input type="text"name = 'Fname' placeholder="First Name"> 
       <input type="text"name = 'Lname' placeholder="Last Name">
       </pre>
       <p>
                  If you need to change patient location
              <br>specify the Medical Unit and the bed
       </p>
       <pre>
              Medical Unit: <input type="number"
       name = 'MU' placeholder="Unit number">
              Bed Number: <input type="number"
       name = 'BID' placeholder="Bed number">
       </pre>

       <input type="submit" value="Edit">

</form>
<br><br>
<a href="https://hospitaldbw.000webhostapp.com/admin.php">
       <button>Back to admin</button>
     </a>
</div>
</body>
</html>