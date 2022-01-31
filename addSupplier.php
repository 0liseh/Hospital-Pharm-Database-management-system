<?php
function printAddSupplierForm () {
    echo "
    <form method='post' action='processAddSupplier.php'>
    <label for='supplierName'>Supplier Name:</label>
    <input type='varchar(255)' name='supplierName'>
    <label for='supplierLocation'>Supplier Location:</label>
    <input type='varchar(255)' name='supplierLocation'><br><br>
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
p {text-align: center;}
</style>
</head>
<body>

<h1>Add Supplier</h1>
<?php
echo "<h2>Employee Number: " . $_COOKIE["employeeID"]. "</h2>";
echo "<h2>First Name: " . $_COOKIE["employeeFName"]. "</h2>";
echo "<h2>Last Name: " . $_COOKIE["employeeLName"]. "</h2>";
?>
<div align = 'center'>

<?php
if (!isset($_POST["supplierName"]) || !isset($_POST["supplierLocation"])) {
    printAddSupplierForm();
} else {
    if (empty($_POST["supplierName"]) || empty($_POST["supplierLocation"])) {
        printAddSupplierForm();
        echo"
        <br><br>
        Invalid inputs. Please enter valid inputs.
        ";
    }
}
?>
<br><br>
<a href="supplier.php">
       <button>Back</button>
</a>
</body>
</html>