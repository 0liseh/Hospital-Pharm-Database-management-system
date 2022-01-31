<?php
require "supplierController.php";
if (empty($_POST["supplierName"]) || empty($_POST["supplierLocation"])) {
    header("Location: addSupplier.php");
} else {
    updateSupplier($_POST["supplierName"]);
    updateSupplierLocation($_POST["supplierName"], $_POST["supplierLocation"]);
    header("Location: supplier.php");
}
?>