<html>
<head>
<style>
h1 {text-align: center;}
p {text-align: center;}
</style>
</head>
<body>

<h1>Assign page</h1>
<div align = 'center'>
       
<?php
$message = "Administrator ID is ".$_COOKIE["employeeID"];
echo $message;
$host = "localhost";
$username = "id18047674_group41";
$password = "CPSC471@Group41";
$dbname = "id18047674_hospitalpharmacydatabase";

$con = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno($con)) {
        echo "Failed to connect";
}

$message = "<h2 style='text-align:center'>Patient's Primary Nurse Assigned</h2>";
echo $message;
echo "<div align = 'center'>
<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Health Care Number</th>
<th>Primary Nurse First Name</th>
<th>Primary Nurse ID</th>
</tr>";
$sql = "SELECT p.HealthcareNumber as HCN, p.FName as PFN, p.LName as PLN, p.PrimaryNurseId as PNID, s.FName as NFN 
FROM Patient AS p JOIN Staff AS s 
WHERE s.EmployeeNumber = p.PrimaryNurseId";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['PFN'] . "</td>";
        echo "<td>" . $row['PLN'] . "</td>";
        echo "<td>" . $row['HCN'] . "</td>";
        echo "<td>" . $row['NFN'] . "</td>";
        echo "<td>" . $row['PNID'] . "</td>";
        echo "</tr>";
}
echo "</table>";
$message = "<br><h2 style='text-align:center'>Patient's Secondary Nurse Assigned</h2>";
echo $message;
echo "<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Health Care Number</th>
<th>Secondary Nurse First Name</th>
<th>Secondary Nurse ID</th>
</tr>";
$sql = "SELECT p.HealthcareNumber as HCN, p.FName as PFN, p.LName as PLN, p.SecondaryNurseId as SNID, s.FName as NFN
FROM Patient AS p JOIN Staff AS s 
WHERE s.EmployeeNumber = p.SecondaryNurseId";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['PFN'] . "</td>";
        echo "<td>" . $row['PLN'] . "</td>";
        echo "<td>" . $row['HCN'] . "</td>";
        echo "<td>" . $row['NFN'] . "</td>";
        echo "<td>" . $row['SNID'] . "</td>";

        echo "</tr>";
} 

echo "</table>"; 

$message = "<h2 style='text-align:center'>Patients Who have No Primary Nurse Assigned</h2>";
echo $message;

echo "
<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Health Care Number</th>
</tr>";
$sql = "SELECT * FROM Patient WHERE PrimaryNurseId IS NULL";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['FName'] . "</td>";
        echo "<td>" . $row['LName'] . "</td>";
        echo "<td>" . $row['HealthcareNumber'] . "</td>";
        echo "</tr>";
}
echo "</table>";
$message = "<br><h2 style='text-align:center'>Patients Who have No Secondary Nurse Assigned</h2>";
echo $message;
echo "<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Health Care Number</th>
</tr>";
$sql = "SELECT * FROM Patient WHERE SecondaryNurseId IS NULL";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['FName'] . "</td>";
        echo "<td>" . $row['LName'] . "</td>";
        echo "<td>" . $row['HealthcareNumber'] . "</td>";
        echo "</tr>";
} 

echo "</table>
</div>"; 
  

?>

<br><br>
<p> Assign Nurse </p>
<form method="post" action = "finalAssignNurse.php">
       <pre><input type="text"
       name = 'HCN' placeholder="health care number"> 
       </pre>
       <pre><input type="text"
       name = 'NID' placeholder="Nurse ID">
       </pre>
       <pre>
        <input type="radio" name="assignment"
                value="Primary">Primary
          
        <input type="radio" name="assignment"
                value="Secondary">Secondary
                
        </pre>
       <input type="submit" value="Assign">

</form>

<br><br>
<a href="https://hospitaldbw.000webhostapp.com/patient.php">
       <button>Back to patient</button>
</a>
</div>
</body>
</html>