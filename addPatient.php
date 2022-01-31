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
if(isset($_POST['HCN']) && isset($_POST['Fname']) && isset($_POST['Lname']) && isset($_POST['MU']) && isset ($_POST['BID'])){
        
    $HCN = $_POST['HCN'];
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $PNID = $_POST['PNID'];
    $SNID = $_POST['SNID'];
    $MU = $_POST['MU'];
    $BID = $_POST['BID'];
    if($PNID == NULL && $SNID == NULL){
        $message1 = "<h1>ADDED SUCCESSFULY!</h1>";
        $message2 = "<p>Showing your new updated table</p>";
        echo $message1;
        echo $message2;
        $add = "INSERT INTO Patient (HealthcareNumber, FName, LName, PrimaryNurseId, SecondaryNurseId) 
        VALUES ('". $HCN."','". $Fname."','". $Lname."',NULL, NULL) ";
    }
    else if($PNID != NULL && $SNID == NULL){
        $message1 = "<h1>ADDED SUCCESSFULY!</h1>";
        $message2 = "<p>Showing your new updated table</p>";
        echo $message1;
        echo $message2;
        $add = "INSERT INTO Patient (HealthcareNumber, FName, LName, PrimaryNurseId, SecondaryNurseId) 
        VALUES ('". $HCN."','". $Fname."','". $Lname."','".$PNID."', NULL) ";
    }
    else{
        $message1 = "<h1>ADDED SUCCESSFULY!</h1>";
        $message2 = "<p>Showing your new updated table</p>";
        echo $message1;
        echo $message2;
        $add = "INSERT INTO Patient (HealthcareNumber, FName, LName, PrimaryNurseId, SecondaryNurseId) 
        VALUES ('". $HCN."','". $Fname."','". $Lname."','".$PNID."', '".$SNID."') ";
    }
    // add to table
    if (!mysqli_query($con, $add)) {
        die("Error".mysqli_error($con));
    }

    if($MU != NULL && $BID != NULL){
        //check if bed is empty
        $checkB = checkBed($con, $MU, $BID);

        if($checkB == false){
            echo "<h1>BED IS ALREADY OCCUPIED PATIENT NEEDS TO BE REASSIGNED A BED</H1>";
        }
        else{
            $hospital = "UPDATE Bed SET OccupyingPatientId = '".$HCN."' WHERE MedUnitNumber = ".$MU." AND Number= ".$BID;
            if (!mysqli_query($con, $hospital)) {
                die("Error".mysqli_error($con));
            }
        }  
    }

    $message = "<h2 style='text-align:center'>All Patients Assigned to a Bed</h2>";
    echo $message;

    echo "<div align = 'center'>
    <table border='1'>
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Health Care Number</th>
    <th>Primary Nurse ID</th>
    <th>Secondary Nurse ID</th>
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
}
else{
        $message1 = "<h1>There was a Problem</h1>";
        $message2 = "<p>Adding Unsuccsessful You must specify patient information as well as the Bed and medicul unit</p>";
        echo $message1;
        echo $message2;
}

//checks if bed is available
function checkBed($con, $MU, $BID){
    $query = "SELECT * FROM Bed WHERE MedUnitNumber = ".$MU." AND Number = ".$BID." AND OccupyingPatientId IS NULL";
    $check = mysqli_query($con, $query);
    $row = mysqli_fetch_array($check);
    if(!$row) {
        //empty table
        return false;
    } else {
        //table shows a value
        return true;
    }
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