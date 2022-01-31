<html>
<head>
<style>
h1 {text-align: center;}
h2 {text-align: center;}
p {text-align: center;}
</style>
</head>
<body>

<h1>Supplier Menu</h1>
<?php
echo "<h2>Employee Number: " . $_COOKIE["employeeID"]. "</h2>";
echo "<h2>First Name: " . $_COOKIE["employeeFName"]. "</h2>";
echo "<h2>Last Name: " . $_COOKIE["employeeLName"]. "</h2>";
?>
<div align = 'center'>
<br><br><br><br>
<a href="viewSuppliers.php">
       <button>View Supplier</button>
</a>
<br><br><br><br>
<a href="addSupplier.php">
       <button>Add Supplier</button>
</a>
<br><br><br><br>
<a href="removeSupplier.php">
       <button>Remove Supplier</button>
</a>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
if ($_COOKIE["employeeType"] == 2) { // Pharmacist
    echo "<a href='pharmacist.php'>
       <button>Back</button>
    </a>";
} else if ($_COOKIE["employeeType"] == 3) { // Admin
    echo "<a href='admin.php'>
       <button>Back</button>
    </a>";
}
?>
</div>
</body>
</html>