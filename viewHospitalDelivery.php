<?php
require "deliveryController.php";
$con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
?>

<html>
<head>
<style>
h1 {text-align: center;}
h2 {text-align: center;}
p {text-align: center;}
</style>
</head>
<body>

<h1>Hospital Delivery Record</h1>
<?php
echo "<h2>Employee Number: " . $_COOKIE["employeeID"]. "</h2>";
echo "<h2>First Name: " . $_COOKIE["employeeFName"]. "</h2>";
echo "<h2>Last Name: " . $_COOKIE["employeeLName"]. "</h2>";
?>
<div align = 'center'>

<?php
echo "<table border = '1'>
<tr>
<th>Number</th>
<th>Date/Time</th>
<th>Supplier</th>
<th>Pharmaceutical ID</th>
<th>Number of Pharmaceutical</th>
</tr>";
$result = mysqli_query($con, "SELECT * FROM Delivery");
while ($row = mysqli_fetch_array($result)) {
    if ($row["Type"] == 0) {
        echo "<tr>";
        echo "<td>".$row["Number"]."</td>";
        echo "<td>".$row["DateTime"]."</td>";
        echo "<td>".$row["Supplier"]."</td>";
        echo "<td>".getDeliveryPharmId($row["Number"])."</td>";
        echo "<td>".getDeliveryPharmNum($row["Number"])."</td>";
        echo "</tr>";
    }
}
echo "</table>";
?>
<br><br>
<a href="delivery.php">
       <button>Back</button>
</a>
</body>
</html>