<?php
require "medicalBedController.php";
function printMedicineCaseDeliveryForm () {
    echo "
    <form method='post' action='processMedicineCaseDelivery.php'>
    <label for='patientNumber'>Patient Healthcare Number</label>
    <input type='varchar(255)' name='patientNumber'>
    <label for='pharmaceuticalName'>Pharmaceutical Name:</label>
    <input type='varchar(255)' name='pharmaceuticalName'>
    <label for='pharmaceuticalAmount'>Pharmaceutical Amount:</label>
    <input type='varchar(255)' name='pharmaceuticalAmount'><br><br>
    <input type='submit' value='Record'>
    </form>
    ";
}
?>

<html>
<head>
<style>
h1 {text-align: center;}
h2 {text-align: center;}
h3 {text-align: center;}
p {text-align: center;}
</style>
</head>
<body>

<h1>Record Medicine Case Delivery</h1>
<?php
echo "<h2>Employee Number: " . $_COOKIE["employeeID"]. "</h2>";
echo "<h2>First Name: " . $_COOKIE["employeeFName"]. "</h2>";
echo "<h2>Last Name: " . $_COOKIE["employeeLName"]. "</h2>";
?>
<div align = 'center'>

<h3>Nurse Orders</h3>
<?php
echo "<table border = 1>";
echo "<tr>";
echo "<th>Nurse Employee Number</th>";
echo "<th>Patient Healthcare Number</th>";
echo "<th>Pharmaceutical ID</th>";
echo "<th>Number of Pharmaceutical</th>";
echo "<th>Date and Time of Order</th>";
echo "<th>Medical Unit Number</th>";
echo "<th>Bed Number</th";
echo "</tr>";
$con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
if (mysqli_connect_errno($con)) {
   echo "Failed to connect";
}
$sql = "SELECT * FROM Nurse_Order";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row["NurseEmployeeNumber"]."</td>";
    echo "<td>".$row["PatientHealthcareNumber"]."</td>";
    echo "<td>".$row["IdPharmaceutical"]."</td>";
    echo "<td>".$row["NumOfPharm"]."</td>";
    echo "<td>".$row["DateTime"]."</td>";
    echo "<td>".getMedUnit($row["PatientHealthcareNumber"])."</td>";
    echo "<td>".getBedNumber($row["PatientHealthcareNumber"])."</td>";
    echo "</tr>";
}
echo "</table><br><br>";

if (!isset($_POST["patientNumber"]) || !isset($_POST["pharmaceuticalName"]) || !isset($_POST["pharmaceuticalAmount"])) {
    printMedicineCaseDeliveryForm();
} else {
    if (empty($_POST["patientNumber"]) || empty($_POST["pharmaceuticalName"]) || empty($_POST["pharmaceuticalAmount"])) {
        printMedicineCaseDeliveryForm();
        echo"
        <br><br>
        Invalid inputs. Please enter valid inputs.
        ";
    }
}

?>
<br><br>
<a href="delivery.php">
       <button>Back</button>
</a>
</body>
</html>