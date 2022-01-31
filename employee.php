<html>
<head>
<style>
h1 {text-align: center;}
p {text-align: center;}
</style>
</head>
<body>

<h1>Employee page</h1>
<div align = 'center'>

<?php
$message = "This is the Employee's page. Administrator ID is ".$_COOKIE["employeeID"];
echo $message;
$host = "localhost";
$username = "id18047674_group41";
$password = "CPSC471@Group41";
$dbname = "id18047674_hospitalpharmacydatabase";

$con = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno($con)) {
        echo "Failed to connect";
}
$message = "<h2 style='text-align:center'>All Employees</h2>";
echo $message;
if( isset($_COOKIE["employeeID"])){
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
    echo "No patients assigned";
}


?>

<br><br>
<p><u> Add New Employee  </u></p>
<form method="post" action = "addEmployee.php">
       <pre>Employee ID: <input type="text"
       name = 'EID' placeholder="Required"> 
       </pre>
       <pre>Full Name: <input type="text"name = 'Fname' placeholder="First Name"> <input type="text"name = 'Lname' placeholder="Last Name">
       </pre>
       <pre>
       <input type="radio" name="assignment"
              value="Doctor">Doctor
       <input type="radio" name="assignment"
              value="Nurse">Nurse
       <input type="radio" name="assignment"
              value="Pharmasist">Phramacist
       </pre>
       <input type="submit" value="Add">

</form>
<br>
<p><u> Remove Employee </u></p>
<form method="post" action = "removeEmployee.php">
       <pre>Employee ID: <input type="text"
       name = 'EID' placeholder="Required"> 
       </pre>
       <input type="submit" value="Remove">
</form>
<br>
<p><u>Edit Existing Employee</u></p>
<form method="post" action = "editEmployee.php">
       <pre>Employee ID: <input type="text"
       name = 'EID' placeholder="Required"> 
       </pre>
       <p> Fields to edit</p>
       <pre>Employee Name: 
       <input type="text"name = 'Fname' placeholder="First Name"> 
       <input type="text"name = 'Lname' placeholder="Last Name">
       </pre>
       <pre>Employee Type: <input type="number"
       name = 'type' placeholder="Nurse-0, Doctor-1, Pharmasist-2"> 
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