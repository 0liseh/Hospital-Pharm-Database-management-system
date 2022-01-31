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
if(isset($_POST['HCN']) && isset($_POST['NID']) && isset($_POST['assignment'])){
    $message1 = "<h1>ASSIGNED SUCCESSFULY!</h1>";
    $message2 = "<p>Showing the new updated table of Patients</p>";
    echo $message1;
    echo $message2;
    $patient = $_POST['HCN'];
    $NID = $_POST['NID'];
    $A = $_POST['assignment'];
    if($A == "Primary"){
        $update = "UPDATE Patient SET PrimaryNurseId = '". $NID."' WHERE HealthcareNumber= '".$patient."'";
        $result = mysqli_query($con, $update); 
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
        echo "</table>;
        </div>"; 
    }
    elseif ($A == "Secondary") {
        $update = "UPDATE Patient SET SecondaryNurseId = '". $NID."' WHERE HealthcareNumber= '".$patient."'";
        $result = mysqli_query($con, $update); 
        echo "<div align = 'center'>
        <table border='1'>
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Health Care Number</th>
        <th>Secondary Nurse First Name</th>
        <th>Secondary Nurse ID</th>
        </tr>";
        $sql = "SELECT p.HealthcareNumber as HCN, p.FName as PFN, p.LName as PLN, p.SecondaryNurseId as PNID, s.FName as NFN 
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
        echo "</table>;
        </div>";
    }   


}
else {
    $message1 = "<h1>There was a Problem</h1>";
    $message2 = "<p>Assignment Unsuccsessful</p>";
    echo $message1;
    echo $message2;
}

?>
<div align = 'center'>
<br><br><br><br><br><br><br><br><br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/assignNurse.php">
       <button>Back to assign</button>
</a>
</div>
</body>
</html>