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

$HCN = 0;
$Fname = "";
$Lname = "";
$PNID = 0;
$SNID = 0;
if(isset($_POST['HCN'])){
        
    $message1 = "<h1>REMOVED SUCCESSFULY!</h1>";
    $message2 = "<p>Showing your new updated table</p>";
    echo $message1;
    echo $message2;
    $HCN = $_POST['HCN'];

    $rMedcase = "UPDATE Delivery SET MedCase = NULL WHERE MedCase =".$HCN;

    $remove = "DELETE FROM Patient WHERE HealthcareNumber =".$HCN;
    if (!mysqli_query($con, $rMedcase)) {
        die("Error".mysqli_error($con));
    }

    if (!mysqli_query($con, $remove)) {
        die("Error".mysqli_error($con));
    }

    $message = "<h2 style='text-align:center'>All Patients</h2>";
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
    $sql = "SELECT * from Patient";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
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

  
}
else{
        $message1 = "<h1>There was a Problem</h1>";
        $message2 = "<p>Removing was Unsuccsessful</p>";
        echo $message1;
        echo $message2;
}

?>
<div align = 'center'>
<br><br><br><br><br><br><br><br><br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/patient.php">
       <button>Back to patient</button>
</a>
</div>
</body>
</html>