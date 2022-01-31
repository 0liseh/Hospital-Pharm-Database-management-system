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
if(isset($_POST['EID'])){
        
    $EID = $_POST['EID'];
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $type = $_POST['type'];
    //Nothing changed
    if($Fname == NULL && $Lname == NULL){
        $update = "SELECT * FROM Staff WHERE EmployeeNumber=".$EID;
        $message1 = "<h1>NOTTHING WAS CHANGED</h1>";
        $message2 = "<p>Showing your new updated table</p>";
    }
    //only Fname was changed
    else if($Fname != NULL && $Lname == NULL){
        $update = "UPDATE Staff SET FName= '". $Fname."'
        WHERE EmployeeNumber=".$EID;
        $message1 = "<h1>EDIT WAS SUCCESSFUL FNAME</h1>";
        $message2 = "<p>Showing your new updated table</p>";
    }
    //only Lname was changed
    else if($Fname == NULL && $Lname != NULL){
        $update = "UPDATE Staff SET LName= '". $Lname."'
        WHERE EmployeeNumber=".$EID;
        $message1 = "<h1>EDIT WAS SUCCESSFUL LNAME</h1>";
        $message2 = "<p>Showing your new updated table</p>";
    }
    //both Fname and Lname were changed
    else if($Fname != NULL && $Lname != NULL){
        $update = "UPDATE Staff SET FName= '". $Fname."', LName= '". $Lname."'
        WHERE EmployeeNumber=".$EID;
        $message1 = "<h1>EDIT WAS SUCCESSFUL!</h1>";
        $message2 = "<p>Showing your new updated table</p>";
    }
    if($type != NULL){
        $change = "UPDATE Staff SET Type= '". $type."' WHERE EmployeeNumber=".$EID;
        if (!mysqli_query($con, $change)) {
            die("Error".mysqli_error($con));
        }
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
        $message2 = "<p>Edit was Unsuccsessful</p>";
        echo $message1;
        echo $message2;
}

?>
<div align = 'center'>
<br><br><br><br><br><br><br><br><br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/employee.php">
       <button>Back to patient</button>
</a>
</div>
</body>
</html>