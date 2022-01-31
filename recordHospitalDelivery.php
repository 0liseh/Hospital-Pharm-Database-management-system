<?php
function printHospitalDeliveryForm () {
    echo "
    <form method='post' action='processHospitalDelivery.php'>
    <label for='supplierName'>Supplier Name:</label>
    <input type='varchar(255)' name='supplierName'>
    <label for='supplierLocation'>Supplier Location:</label>
    <input type='varchar(255)' name='supplierLocation'>
    <label for='pharmaceuticalName'>Pharmaceutical Name:</label>
    <input type='varchar(255)' name='pharmaceuticalName'>
    <label for='pharmaceuticalAmount'>Pharmaceutical Amount:</label>
    <input type='varchar(255)' name='pharmaceuticalAmount'><br><br>
    <label for='pharmaceuticalType'>Pharmaceutical Type:</label><br>
    <input type='radio' id='drug' name='pharmaceuticalType' value='Drug'>
    <label for='html'>Drug</label>
    <input type='radio' id='vitamin/herb' name='pharmaceuticalType' value='Vitamin/Herb'>
    <label for='html'>Vitamin/Herb</label><br>
    <label for='pharmaceuticalIdentification'>Pharmaceutical DIN/VIN:</label>
    <input type='varchar(255)' name='pharmaceuticalIdentification'>
    <br><br>
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

<h1>Record Hospital Delivery</h1>
<?php
echo "<h2>Employee Number: " . $_COOKIE["employeeID"]. "</h2>";
echo "<h2>First Name: " . $_COOKIE["employeeFName"]. "</h2>";
echo "<h2>Last Name: " . $_COOKIE["employeeLName"]. "</h2>";
?>
<div align = 'center'>

<?php
if (!isset($_POST["supplierName"]) || !isset($_POST["supplierLocation"]) || !isset($_POST["pharmaceuticalName"]) || !isset($_POST["pharmaceuticalAmount"]) || !isset($_POST["pharmaceuticalType"]) || !isset($_POST["pharmaceuticalIdentification"])) {
    printHospitalDeliveryForm();
} else {
    if (empty($_POST["supplierName"]) || empty($_POST["supplierLocation"]) || empty($_POST["pharmaceuticalName"]) || empty($_POST["pharmaceuticalAmount"]) || empty($_POST["pharmaceuticalType"]) || empty($_POST["pharmaceuticalIdentification"])) {
        printHospitalDeliveryForm();
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