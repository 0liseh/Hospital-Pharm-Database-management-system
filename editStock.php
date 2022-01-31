<?php
$con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
if (mysqli_connect_errno($con)) {
   echo "Failed to connect";
}
function printEditStockForm () {
    echo "
    <form method='post' action='processEditStock.php'>
    <label for='pharmaceuticalId'>Pharmaceutical ID:</label>
    <input type='varchar(255)' name='pharmaceuticalId'>
    <label for='pharmaceuticalAmount'>Pharmaceutical New Amount:</label>
    <input type='varchar(255)' name='pharmaceuticalAmount'><br><br>
    <input type='submit' value='Modify'>
    </form>
    ";
}

function printAddStockForm () {
    echo "
    <form method='post' action='processAddStock.php'>
    <label for='pharmaceuticalName'>Pharmaceutical Name:</label>
    <input type='varchar(255)' name='pharmaceuticalName'>
    <label for='pharmaceuticalAmount'>Pharmaceutical Amount:</label>
    <input type='varchar(255)' name='pharmaceuticalAmount'><br>
    <label for='pharmaceuticalType'>Pharmaceutical Type:</label>
    <input type='radio' id='drug' name='pharmaceuticalType' value='Drug'>
    <label for='html'>Drug</label>
    <input type='radio' id='vitamin/herb' name='pharmaceuticalType' value='Vitamin/Herb'>
    <label for='html'>Vitamin/Herb</label><br>
    <label for='pharmaceuticalIdentification'>Pharmaceutical DIN/VIN:</label>
    <input type='varchar(255)' name='pharmaceuticalIdentification'>
    <br><br>
    <input type='submit' value='Add'>
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

<h1>Edit Stock</h1>
<?php
echo "<h2>Employee Number: " . $_COOKIE["employeeID"]. "</h2>";
echo "<h2>First Name: " . $_COOKIE["employeeFName"]. "</h2>";
echo "<h2>Last Name: " . $_COOKIE["employeeLName"]. "</h2>";
?>
<div align = 'center'>

<table border='1'>
    <tr>
        <th>Name</th>
        <th>Number in Stock</th>
        <th>Pharmaceutical Id</th>
    </tr>
<?php
$sql = "SELECT * FROM Pharmaceutical";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row["Name"]."</td><td>".$row["NumberInStock"]."</td><td>".$row["IdPharmaceutical"]."</td>";
    echo "<tr>";
}
?>
</table>

<h3>Modify Exisiting Pharmaceutical</h3>
<?php printEditStockForm(); ?>
<br>
<h3>Add Item</h3>
<?php printAddStockForm(); ?>
<br><br>
<a href="stock.php">
       <button>Back</button>
</a>
</body>
</html>