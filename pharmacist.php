<html>
<head>
<style>
h1 {text-align: center;}
h2 {text-align: center;}
p {text-align: center;}
</style>
</head>
<body>

<h1>Pharmacist Menu</h1>
<?php
echo "<h2>Employee Number: " . $_COOKIE["employeeID"]. "</h2>";
echo "<h2>First Name: " . $_COOKIE["employeeFName"]. "</h2>";
echo "<h2>Last Name: " . $_COOKIE["employeeLName"]. "</h2>";
?>
<div align = 'center'>


<br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/delivery.php">
       <button>Deliveries</button>
</a>
<br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/supplier.php">
       <button>Supplier</button>
</a>
<br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/stock.php">
       <button>Stock</button>
</a>
<br><br><br><br><br><br><br><br><br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/processLogout.php">
       <button>Logout</button>
     </a>
</div>
</body>
</html>