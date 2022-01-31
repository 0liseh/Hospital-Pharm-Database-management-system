<html>
<head>
<style>
h1 {text-align: center;}
p {text-align: center;}
</style>
</head>
<body>

<h1>Doctor page</h1>
<div align = 'center'>
       
<?php
require "stockController.php";
$message = "This is the Doctor's page. Employee ID is ".$_COOKIE["employeeID"];
echo $message;
$host = "localhost";
$username = "id18047674_group41";
$password = "CPSC471@Group41";
$dbname = "id18047674_hospitalpharmacydatabase";
$message = "<h1 style='text-align:center'>These are your assigned patients</h1>";
echo $message;
$con = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno($con)) {
        echo "Failed to connect";
}

if( isset($_COOKIE["employeeID"])){
    echo "<div align = 'center'>
    <table border='1'>
    <tr>
    <th>Patient First Name</th>
    <th>Patient Last Name</th>
    <th>Health Care Number</th>
    <th>Pharmaceutical Name</th>
    <th>PID</th>
    <th>Number Prescribed</th>
    </tr>";
    $sql = "SELECT * FROM Diagnosis AS d JOIN Patient AS p JOIN Pharmaceutical AS ph
              WHERE d.PatientHealthcareNum = p.HealthcareNumber AND d.IdPharmaceutical = ph.IdPharmaceutical AND DoctorEmployeeNumber = ".$_COOKIE["employeeID"];
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['FName'] . "</td>";
            echo "<td>" . $row['LName'] . "</td>";
            echo "<td>" . $row['PatientHealthcareNum'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['IdPharmaceutical'] . "</td>";
            echo "<td>" . $row['NumOfPharm'] . "</td>";
            echo "</tr>";
    } 
    echo "</table>
    </div>";

    echo"<h1 style='text-align:center'>Pharmaceutical Record</h1>";
    printStockNurse();

}
else{
    echo "No patients assigned";
}

?>

<br><br>
<p> Prescribe New Pharmaceutical  </p>
<form method="post" action = "addDiagnosis.php">
       <pre>Patient Health Care Number: <input type="text"
       name = 'HCN' placeholder="health care number"> 
       </pre>
       <pre>Pharmaceutical ID: <input type="text"
       name = 'PID' placeholder="Pharmaceutical ID">
       </pre>
       <pre>Amount of Phramaceutical prescribed: <input type="number"
       name = 'Pnum' placeholder="enter ammount">
       </pre>

       <input type="submit" value="Add">

</form>

<br><br>
<p> Update an existing prescription </p>
<form method="post" action = "updateDiagnosis.php">
       
       <pre>Patient Health Care Number: <input type="text"
       name = 'HCN' placeholder="health care number"> 
       </pre>
      
       <pre>Pharmaceutical ID: <input type="text"
       name = 'PID' placeholder="Pharmaceutical ID">
       </pre>
      
       <pre>Ammount of Phramaceutical prescribed: <input type="number"
       name = 'Pnum' placeholder="enter ammount">
       </pre>

       <input type="submit" value="Update">

</form>
<br><br>
<a href="https://hospitaldbw.000webhostapp.com/processLogout.php">
       <button>Back to login</button>
</a>
</div>
</body>
</html>