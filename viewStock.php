<?php
require "stockController.php";
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
h3 {text-align: center;}
p {text-align: center;}
</style>
</head>
<body>

<h1>View Pharmaceutical Stock</h1>
<?php
echo "<h2>Employee Number: " . $_COOKIE["employeeID"]. "</h2>";
echo "<h2>First Name: " . $_COOKIE["employeeFName"]. "</h2>";
echo "<h2>Last Name: " . $_COOKIE["employeeLName"]. "</h2>";
echo "<br>"
?>
<div align = 'center'>

<?php
echo "<h3>Drugs</h3>";
echo "<table border = '1'>
<tr>
<th>DIN</th>
<th>Pharmaceutical ID</th>
<th>Name</th>
<th>Number in Stock</th>
</tr>";
$result = mysqli_query($con, "SELECT * FROM Drug");
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row["DIN"]."</td>";
    echo "<td>".$row["IdPharmaceutical"]."</td>";
    echo "<td>".getName($row["IdPharmaceutical"])."</td>";
    echo "<td>".getPharmNum($row["IdPharmaceutical"])."</td>";
    echo "</tr>";
}
echo "</table>";

echo "<h3>Vitamins and Herbs</h3>";
echo "<table border = '1'>
<tr>
<th>VIN</th>
<th>Pharmaceutical ID</th>
<th>Name</th>
<th>Number in Stock</th>
</tr>";
$result = mysqli_query($con, "SELECT * FROM Vitamin_Herb");
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row["VIN"]."</td>";
    echo "<td>".$row["IdPharmaceutical"]."</td>";
    echo "<td>".getName($row["IdPharmaceutical"])."</td>";
    echo "<td>".getPharmNum($row["IdPharmaceutical"])."</td>";
    echo "</tr>";
}
echo "</table>";
?>
<br><br>
<a href="stock.php">
       <button>Back</button>
</a>
</body>
</html>