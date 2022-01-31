<?php
require "supplierController.php";
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

<h1>Supplier Record</h1>
<?php
echo "<h2>Employee Number: " . $_COOKIE["employeeID"]. "</h2>";
echo "<h2>First Name: " . $_COOKIE["employeeFName"]. "</h2>";
echo "<h2>Last Name: " . $_COOKIE["employeeLName"]. "</h2>";
?>
<div align = 'center'>

<?php
$count = 0;
echo "<table border = '1'>
<tr>
<th>Name</th>
<th>Locations</th>
</tr>";
$result = mysqli_query($con, "SELECT * FROM Supplier");
while ($row = mysqli_fetch_array($result)) {
    $count = $count + 1;
    echo "
    <tr>
    <td>".$row["Name"]."</td>
    <td>";
    $first = 1;
    $locationArray = getLocations($row["Name"]);
    for ($i = 0; $i < count($locationArray); $i++) {
        if ($first) {
            $first = 0;
        } else {
            echo " | ";
        }
        echo $locationArray[$i];
    }
    echo "</td>
    </tr>";
}
echo "</table><br>";
?>
<br><br>
<a href="supplier.php">
       <button>Back</button>
</a>

</body>
</html>