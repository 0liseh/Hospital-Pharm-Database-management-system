<html>
<head>
<style>
h1 {text-align: center;}
p {text-align: center;}
</style>
</head>
<body>
<?php
$host = "localhost";
$username = "id18047674_group41";
$password = "CPSC471@Group41";
$dbname = "id18047674_hospitalpharmacydatabase";
$con = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno($con)) {
        echo "Failed to connect";
}

$patient = 0;
$PID = 0;
$Pnum = 0;
if(isset($_POST['HCN']) && isset($_POST['PID']) && isset($_POST['Pnum']) && isset($_COOKIE["employeeID"])){
        
        $message1 = "<h1>ADDED SUCCESSFULY!</h1>";
        $message2 = "<p>Showing your new updated table</p>";
        echo $message1;
        echo $message2;
        $doctor = $_COOKIE["employeeID"];
        $patient = $_POST['HCN'];
        $PID = $_POST['PID'];
        $Pnum = $_POST['Pnum'];
        $add = "INSERT INTO Diagnosis (DoctorEmployeeNumber, PatientHealthcareNum, IdPharmaceutical, NumOfPharm) VALUES ('". $doctor."','". $patient."','". $PID."','". $Pnum."') ";
        $result = mysqli_query($con, $add); 

        echo "<div align = 'center'>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <table border='1'>
        <tr>
        <th>Health Care Number</th>
        <th>Pharmaceutical ID</th>
        <th>Number of Pharmaceutical</th>
        </tr>";
        $result = mysqli_query($con, "SELECT * FROM Diagnosis WHERE DoctorEmployeeNumber = ".$_COOKIE["employeeID"]);
        while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['PatientHealthcareNum'] . "</td>";
                echo "<td>" . $row['IdPharmaceutical'] . "</td>";
                echo "<td>" . $row['NumOfPharm'] . "</td>";
                echo "</tr>";
        } 
        echo "</table>
        </div>";  
}
else{
        $message1 = "<h1>There was a Problem</h1>";
        $message2 = "<p>Adding Unsuccsessful</p>";
        echo $message1;
        echo $message2;
}

?>
<div align = 'center'>
<br><br><br><br><br><br><br><br><br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/doctor.php">
       <button>Back to doctor</button>
</a>
</div>
</body>
</html>