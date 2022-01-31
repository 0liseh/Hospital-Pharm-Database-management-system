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

$EID = 0;
$Fname = "";
$Lname = "";
$type = "";
if(isset($_POST['EID']) && isset($_POST['Fname']) && isset($_POST['Lname']) && isset($_POST['assignment'])){
        
    $EID = $_POST['EID'];
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $A = $_POST['assignment'];

    if($A == "Doctor"){
        $add = "INSERT INTO Staff (EmployeeNumber, FName, LName, Type) 
        VALUES ('". $EID."','". $Fname."','". $Lname."', '1') ";
        $message1 = "<h1>ADDED DOCTOR SUCCESSFULY!</h1>";
        $message2 = "<p>Showing your new updated table</p>";
    }
    else if($A == "Nurse"){
        $add = "INSERT INTO Staff (EmployeeNumber, FName, LName, Type) 
        VALUES ('". $EID."','". $Fname."','". $Lname."', '0') ";
        $message1 = "<h1>ADDED NURSE SUCCESSFULY!</h1>";
        $message2 = "<p>Showing your new updated table</p>";
    }
    else if($A == "Pharmasist"){
        $add = "INSERT INTO Staff (EmployeeNumber, FName, LName, Type) 
        VALUES ('". $EID."','". $Fname."','". $Lname."', '2') ";
        $message1 = "<h1>ADDED PHARMACIST SUCCESSFULY!</h1>";
        $message2 = "<p>Showing your new updated table</p>";
    }
    else{
        $add = "SELECT * FROM Staff";
        $message1 = "<h1>THERE WAS AN ERROR!</h1>";
    }

    echo $message1;
    echo $message2;

    if (!mysqli_query($con, $add)) {
        die("Error".mysqli_error($con));
    }

    $message = "<h2 style='text-align:center'>All Patients</h2>";
    echo $message;

    echo "<div align = 'center'>
    <table border='1'>
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Employee ID</th>
    <th>Type (Nurse-0, Doctor-1, Pharmacist-2)</th>
    </tr>";
    $sql = "SELECT * from Staff";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['FName'] . "</td>";
            echo "<td>" . $row['LName'] . "</td>";
            echo "<td>" . $row['EmployeeNumber'] . "</td>";
            echo "<td>" . $row['Type'] . "</td>";
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
<a href="https://hospitaldbw.000webhostapp.com/employee.php">
       <button>Back to employee</button>
</a>
</div>
</body>
</html>