<html>
<head>
<style>
h1 {text-align: center;}
h2 {text-align: center;}
p {text-align: center;}
</style>
</head>
<body>

<h1>Stock Menu</h1>
<?php
echo "<h2>Employee Number: " . $_COOKIE["employeeID"]. "</h2>";
echo "<h2>First Name: " . $_COOKIE["employeeFName"]. "</h2>";
echo "<h2>Last Name: " . $_COOKIE["employeeLName"]. "</h2>";
?>
<div align = 'center'>
<br><br><br><br>
<a href="viewStock.php">
       <button>View Stock</button>
</a>
<br><br><br><br>
<a href="editStock.php">
       <button>Edit Stock</button>
</a>

<br><br><br><br><br><br><br><br><br><br><br><br>
<a href="pharmacist.php">
       <button>Back</button>
     </a>
</div>
</body>
</html>