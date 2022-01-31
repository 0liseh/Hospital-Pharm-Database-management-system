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
if(isset($_POST['HCN'])){
        
        $HCN = $_POST['HCN'];
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $MU = $_POST['MU'];
        $BID = $_POST['BID'];

        //Nothing changed
        if($Fname == NULL && $Lname == NULL){
            $update = "SELECT * FROM Patient WHERE HealthcareNumber=".$HCN;
            $message1 = "<h1>NO INFORMATION ABOUT THE PATIENT WAS CHANGED</h1>";
            $message2 = "<p>Showing your new updated table</p>";
        }
        //only Fname was changed
        else if($Fname != NULL && $Lname == NULL){
            $update = "UPDATE Patient SET FName= '". $Fname."'
            WHERE HealthcareNumber=".$HCN;
            $message1 = "<h1>SUCCESSFULLY CHANGED FIRST NAME</h1>";
            $message2 = "<p>Showing your new updated table</p>";
        }
        //only Lname was changed
        else if($Fname == NULL && $Lname != NULL){
            $update = "UPDATE Patient SET LName= '". $Lname."'
            WHERE HealthcareNumber=".$HCN;
            $message1 = "<h1>SUCCESSFULLY CHANGED LAST NAME</h1>";
            $message2 = "<p>Showing your new updated table</p>";
        }
        //both Fname and Lname were changed
        else if($Fname != NULL && $Lname != NULL){
            $update = "UPDATE Patient SET FName= '". $Fname."', LName= '". $Lname."'
            WHERE HealthcareNumber=".$HCN;
            $message1 = "<h1>SUCCESSFULLY CHANGED LAST NAME AND FIRST NAME!</h1>";
            $message2 = "<p>Showing your new updated table</p>";
        }

        if($MU != NULL && $BID != NULL){
            $checkB = checkBed($con,$MU, $BID);
            $checkP = checkPatient($con, $HCN);

            // Patient is not in a bed 
            if($checkP == true){
                echo "<h1>PATIENT ALREADY IN A BED</H1>";
            } 
            // Bed is not occupied
            else if($checkB == false){
                echo "<h1>BED IS ALREADY OCCUPIED</H1>";
            }

            else{
                $change = "UPDATE Bed SET OccupyingPatientId = '".$HCN."' WHERE MedUnitNumber = '".$MU."' AND Number = ".$BID;
                if (!mysqli_query($con, $change)) {
                    die("Error".mysqli_error($con));
                }
                echo "<div  align = 'center'>
                <h1>THE PATIENT WAS MOVED TO BED NUMBER: ".$BID." IN MEDICAL UNIT: ".$MU."</h1>";
            }

  
        }
        else{
            echo "<div  align = 'center'>
            <h2>NEED TO SPECIFY BOTH BED AND MEDICAL UNIT OR NEITHER </h2>";
        }

        echo $message1;
        echo $message2;

        if (!mysqli_query($con, $update)) {
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
        </tr>";
        $sql = "SELECT * from Patient";
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

  
}
else{
        $message1 = "<h1>There was a Problem</h1>";
        $message2 = "<p>Edit was Unsuccsessful</p>";
        echo $message1;
        echo $message2;
}

//checks if the patient is already in a bed
function checkPatient($con, $HCN){
    $query = "SELECT * FROM Bed WHERE OccupyingPatientId =".$HCN;
    $check = mysqli_query($con, $query);
    $row = mysqli_fetch_array($check);
    if(!$row){
        //empty table
        return false;
    } else {
        //table shows a value
        return true;
    }
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