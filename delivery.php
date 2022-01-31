<html>
<head>
<style>
h1 {text-align: center;}
h2 {text-align: center;}
p {text-align: center;}
</style>
</head>
<body>

<h1>Delivery Menu</h1>
<?php
echo "<h2>Employee Number: " . $_COOKIE["employeeID"]. "</h2>";
echo "<h2>First Name: " . $_COOKIE["employeeFName"]. "</h2>";
echo "<h2>Last Name: " . $_COOKIE["employeeLName"]. "</h2>";
?>
<div align = 'center'>

<br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/viewHospitalDelivery.php">
       <button>View hospital delivery</button>
</a>
<br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/recordHospitalDelivery.php">
       <button>Record hospital delivery</button>
</a>
<br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/viewMedicineCaseDelivery.php">
       <button>View medicine case delivery</button>
</a>
<br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/recordMedicineCaseDelivery.php">
       <button>Record medicine case delivery</button>
</a>

<br><br><br><br><br><br><br><br><br><br><br><br>
<a href="https://hospitaldbw.000webhostapp.com/pharmacist.php">
       <button>Back to pharmacist menu</button>
     </a>
</div>
</body>
</html>